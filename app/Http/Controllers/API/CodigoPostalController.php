<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CodigoPostalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Codigo Postal Controller
    |--------------------------------------------------------------------------
    |
    | Controlador para consumir la api de busqueda de código postal del  
    | gis nacional e implementarlo en la aplicación.
    |
    */

    /**
     *
     * @var string $url: Url del archivo env para conectarse a la api
     * @var string $param: prefijo "codigo:"
     */
    public $url,$response;//,$param;

    /**
     * Nueva instancia al controllador.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->url = env('GIS_CP_URL');
        $this->response = [
            "cp"=>"",
            "asentamiento"=>[],
            "municipio"=>[],
            "estado" => []
        ];
    	// $this->param = 'codigo:';
    }


    /**
     * Solicitud a la api externa de gis el codigo postal a busctar.
     *
     * @param string $cp Codigo Postal a buscar en la api.
     *
     * @return object $localidad Información de ese codigo postal
     * (cp,asentamiento/colonia,alcaldía/municipio y estado/ciudad).
     */
    public function getCP($cp)
    {
    	try{
            // construir la url con el código postal a buscar (url/codigo:{cp}) 
    		// $url_consulta = $this->url.$this->param.$cp;
            $url_consulta = $this->url.$cp;
            // Se crea el cliente con la url solicitada.
    		$cliente = new GuzzleClient(['base_uri'=>$url_consulta]);
            // Se lanza la solicitud GET y se almacena la respuesta
    		$res = $cliente->request('GET');
            // Si existe respuesta se decodifica el json en un array
    		$contents = json_decode($res->getBody()->getContents());
            // dd($contents->response);
    		// Encontro resultado
    		if (isset($contents->response)) {
                foreach ($contents->response as $element) {
                    array_push($this->response['asentamiento'], $element->asentamiento);
                    array_push($this->response['municipio'], $element->municipio);
                    array_push($this->response['estado'], $element->estado);
                    $this->response['cp'] = $element->codigo;
                }
                // dd($localidades);
                // Retornamos un objeto json 200 con el objeto localidad creado.
    			return response()->json(['localidad'=>$this->response],200);
    		} 
    		// No encontro resultado (no puedo acceder a los errores)
    		else {
                // Retornamos una respuesta json con status 404 con mensaje Not Found.
    			return response()->json(['error'=>'Código Postal No encontrado'],404);
    		}

    	}
    	catch (RequestException $e) {
            // Si hay una excepción en la petición mandamos un log error con la exception
    		$response = $e->getResponse();
            Log::error('CodigoPostalController@getCP: '.(string)$e);
            // Y retornamos una respuesta json con status 500 con mensaje Internal Error.
    		return response()->json(['error'=>'Internal Error'],500);
    	}
    }
}
