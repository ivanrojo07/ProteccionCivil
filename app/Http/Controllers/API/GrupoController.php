<?php

namespace App\Http\Controllers\API;

use Alert;
use SnappyPDF;
use App\Http\Controllers\Controller;
use App\TipoParentesco;
use App\TipoSangre;
use App\TipoSeguro;
use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException as GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GrupoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Grupo Controller
    |--------------------------------------------------------------------------
    |
    | Controlador para obtener datos de la api 
    | de ClaroAuth360 y crear, editar o eliminar
    | none-user de la api.
    |
    */

    /**
     * Multiples variables del controlador.
     * @var string $url:string que obtiene la url del archivo .env.
     * @var string $group_url: string que tiene la ruta para acceder 
     * a la apí.
     * @var string $image_url: string que tiene la ruta para acceder 
     * a los recursos multimedia.
     * @var GuzzleHttp\Client::class $client: class http cliente para 
     * obtener solicitudes HTTP.
     * @var array App\TipoParentesco $parentesco: array donde toma 
     * todos los registros de la base de datos.
     * @var array App\TipoSangre $tipo_sangre: array donde toma todos los
     * registros de la base de datos.
     * @var array $generos: array donde toma los diferentes tipo de generos.
     * @var array App\TipoSeguro $tipos_seguros: array donde toma los registros
     * de la base de datos.
     * @var array $rules: serie de reglas de validación para el formulario.
     * @var array $message: serie de mensajes para las diferentes reglas de validación.
     */
    public $url,$group_url,$image_url,$client,$parentesco,$tipo_sangre,$generos,$tipos_seguros,$rules,$message;
    // CONSTRUCTOR DANDO VALORES A LAS DIFERENTES VARIABLES
    public function __construct()
    {
        $this->url = env('GLOBAL_API_URL');
        $this->group_url = $this->url.'api/Grupo/';
        $this->image_url=$this->url.'storage/';  //Directorio de imágenes en API
        $this->client = new GuzzleClient(['base_uri'=>$this->group_url]);

        // Array de Precargas
        $this->tipo_seguros = TipoSeguro::orderBy('id','asc')->get();
        $this->parentesco = TipoParentesco::orderBy('id','asc')->get();
        $this->tipo_sangre= TipoSangre::orderBy('id','asc')->get();
        $this->generos=[
            'Masculino',
            'Femenino'
        ];
        // Reglas y mensajes de validación de formularios
        $this->rules=[
            'imagen'=>'nullable|string',
            'nombre'=>'required|string|regex:/^[\pL\s\-]+$/u',
            'apellido_p'=>'nullable|string|regex:/^[\pL\s\-]+$/u',
            'apellido_m'=>'nullable|string|regex:/^[\pL\s\-]+$/u',
            'codigo_postal'=>'nullable|digits:5',
            'calle'=>'nullable|string',
            'numero_ext'=>'nullable|string',
            'numero_int'=>'nullable|string',
            'colonia'=>'nullable|string',
            'alcaldia'=>'nullable|string',
            'estado'=>'nullable|string',
            'edad'=>'required|date|before:'.date('Y-m-d'),
            'alergias'=>'nullable|string|max:250',
            'enfermedades'=>'nullable|string|max:250',
            'tipo_sanguineo'=>'nullable|string|exists:tipo_sangres,name',
            'genero'=>'nullable|string|in:Masculino,Femenino',
            'numero_seguro'=>'nullable|string|max:25',
            'tipo_seguro'=>'nullable|string|exists:tipo_seguros,nombre',
            'nombre_emergencia'=>'nullable|string|max:50',
            'parentesco'=>'nullable|string|exists:tipo_parentescos,name',
            'telefono'=>'nullable|numeric|min:1|max:9999999999',
            'discapacidad'=>'nullable|boolean',
            'cual'=>'nullable|string|max:25'
        ];
        $this->message=[
            'required'=>'El campo :attribute es requerido.',
            'string'=>'El campo :attribute debe ser texto',
            'max'=>'El campo :attribute debe ser maximo de :max caracteres',
            'between'=> 'El campo :attribute debe estar entre el valor :min y el valor :max',
            'digits'=>'el campo :attribute debe tener solo digitos numericos de :value longitud',
            'in'=> 'El campo :attribute debe tener alguno de estos valores: :values',
            'exists'=>'El campo :attribute tiene un valor no valido',
        ];
    }

    /**
     * Busca el noneuser con ese $token dentro de los registros de noneuser.
     *
     * @param arrray $array Lista de registro de noneuser obtenido por el usuario.
     * @param string $token Identificador unico del noneuser a buscar.
     *
     * @return array $array.
     */
    public function findNoneUser($array,$token)
    {
        $index = array_search($token,array_column($array,'tokenid'));
        if ($index !== false) {
            return $array[$index];
        } else {
            return null;
        }
    }

    /**
     * Realiza una solicitud a la api de claroauth360 para buscar el grupo 
     * (o grupos) que tiene a cargo el usuario autenticado en la aplicación.
     * 
     * 
     *
     * @return array $array.
     */
    public function getGrupo()
    {
        /** @var string $token Se obtiene el token del usuario para usar la api
         * claroauth360. */
        $token = Auth::user()->api_token;
        if ($token) {
            // Consumimos la api de claroauth360 para obtener el grupo
            // Creamos los headers
            $options=[
                'headers'=>[
                    'Authorization'=>'Bearer '.$token
                ]
            ];
            try {
                // Lanzamos el cliente con la petición
                $response = $this->client->request('GET','viewGrupos',$options);
                 // A este momento estamos seleccionando el primer grupo del arreglo
                // Esperando a que en algún momento se pueda agregar más de un grupo
                $grupos = json_decode($response->getBody()->getContents(),true)[0];
                $grupos = collect($grupos);
                // Si grupos no esta vacio 
                if($grupos->isNotEmpty()){
                    return $grupos;

                }
                // De lo contrario mandamos null
                else{
                    Log::error('GrupoController@getGrupos: Grupo Vacio de la api');
                    return null;
                }
                
            } catch (GuzzleException $e) {
                // Envia un log de error con los errores y retornamos null
                Log::error('GrupoController@getGrupos: '.(string)$e);
                return null;
            }
        } else {
            // Si no encuentra retorna null
            Log::error('GrupoController@getGrupos: User Api Token not found');
            return null;
        }
    }
    /**
     * SACA EL TOKEN DEL USUARIO Y BUSCA SU GRUPO EN LA API DE CLAROAUTH.
     *
     */
    public function setOptions($request=null,$grupo_id,$noneuser_id=null,$delete=false)
    {
        // API TOKEN DEL USUARIO
        $token = Auth::user()->api_token;
        // SI DELETE ES TRUE CREAMOS LOS PARAMETROS PARA ELIMINAR
        if ($delete) {
            $params = [
                'grupo_id'=>$grupo_id,
                'id'=>(int)$noneuser_id,
                'deleted_at'=>Carbon::now()->format('Y-m-d')
            ];
        }
        // CREAMOS PARAMETROS DE ACTUALIZACION O CREACIÓN
        else {
            // CREAMOS PARAMETROS DEL FORMULARIO CREADO
            $params = [
                'grupo_id'=>$grupo_id,// GRUPO ID
                'nombre'=>($request->nombre ? $request->nombre : ($noneuser_id ? 'NULL' : '')), // NOMBRE DEL NO-USER DE LO CONTRARIO MANDA NULL
                'paterno'=>($request->apellido_p ? $request->apellido_p : ($noneuser_id ? 'NULL' : '')),  // APELLIDO PATERNO DE LO CONTRARIO NULL
                'materno'=>($request->apellido_m ? $request->apellido_m : ($noneuser_id ? 'NULL' : '')),// APELLIDO MATERNO DE LO CONTRARIO NULL
                'telefono_movil'=>($request->tel_movil ? $request->tel_movil : ($noneuser_id ? 'NULL' : '')),// TEL MOVIL SI NO, NULL
                'telefono_hogar'=>($request->tel_hogar ? $request->tel_hogar : ($noneuser_id ? 'NULL' : '')),// TEL HOGAR SI NO NULL
                'genero'=>($request->genero ? $request->genero : ($noneuser_id ? 'NULL' : '')), // GENERO SI NO NULL
                'codigo_postal'=>($request->codigo_postal ? $request->codigo_postal : ($noneuser_id ? 'NULL' : '')), // CP DE LO CONTRARIO NULL
                'direccion'=>($request->calle ? $request->calle : 'N/A').', '.($request->numero_ext ? $request->numero_ext : 'N/A').", ".($request->numero_int ? $request->numero_int : 'N/A').", ".($request->colonia ? $request->colonia : 'N/A').', '.($request->alcaldia ? $request->alcaldia : 'N/A').', '.($request->estado ? $request->estado : 'N/A'),
                // CONCATENAMOS CALLE, NUMERO EXT, NUMERO INT, COLONIA, ALCALDÍA Y ESTADO 
                // (DE NO ENCONTRARSE ALGUN CAMPO SE AGREGA N/A)
                'condicion_medica'=>($request->enfermedades ? $request->enfermedades : ($noneuser_id ? 'NULL' : '')),
                //ENFERMEDADES DE LO CONTRARIO NULL
                'alergias'=>($request->alergias ? $request->alergias : ($noneuser_id ? 'NULL' : '')),//SI TIENE ALERGIAS DE LO CONTRARIO NULL
                'rh'=>($request->tipo_sanguineo ? $request->tipo_sanguineo : ($noneuser_id ? 'NULL' : '')),// TIPO SANGUINEO DE LO CONTRARIO NULL
                'fechadenacimiento'=>date('Y/m/d',strtotime($request->edad)),//FECHA DE NACIMIENTO EN FORMATO AÑO/MES/DIA
                'emergencia_contacto'=>($request->nombre_emergencia ? $request->nombre_emergencia : ($noneuser_id ? 'NULL' : '')),
                // CONTACTO DE EMERGENCIA DE LO CONTRARIO MANDA NULL,
                'parentesco_contacto'=>($request->parentesco ? $request->parentesco : ($noneuser_id ? 'NULL' : '')),
                // TIPO DE PARENTESCO DEL CONTACTO, DE LO CONTRARIO NULL
                'telefono_contacto'=>($request->telefono ? $request->telefono : ($noneuser_id ? 'NULL' : '')),
                // TELEFONO DE EMERGENCIA DE LO CONTRARÍO MANDA NULL
                'numero_seguro'=>($request->numero_seguro ? $request->numero_seguro : ($noneuser_id ? 'NULL' : '')),
                // NUMERO DE SEGURO DE LO CONTRARIO NULL
                'tipo_seguro'=>($request->tipo_seguro ? $request->tipo_seguro : ($noneuser_id ? 'NULL' : '')),
                // SI CUENTA CON ALGUN TIPO DE SEGURO, DE LO CONTRARIO NULL
                'discapacidad'=>($request->discapacidad ? 'true' : 'false'),
                // BOLEANO SI CUENTA O NO CON ALGUNA DISCAPACIDAD
                'tipo_discapacidad'=>($request->cual && $request->discapacidad ? $request->cual : ($noneuser_id ? 'NULL' : '')),
                //SI CUENTA CON DISCAPACIDAD ESPECIFICA QUE CLASE DE DISCAPACIDAD TIENE
                'avatar64'=>$request->imagen
                // FOTO DE DATA64 DE LA IMAGEN
            ];
            // SI SE ACTUALIZA UN NO-USER ES NECESARIO AGREGAR EL ID DEL MISMO
            if($noneuser_id){
                $params['id']= (int)$noneuser_id;
            }
        }
        
        // 
        $headers = [
            'X-Requested-With'=>'XMLHttpRequest',
            'Content-Type'=>'application/x-www-form-urlencoded',
            'Authorization'=>"Bearer $token",
        ];
        $options=[
            'headers'=>$headers,
            'form_params'=>$params

        ];
        return $options;
        
    }


    /**
     * Muestra el grupo del usuario logeado y los noneuser del grupo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Llamar a la función para obtener el grupo del usuario.
        $grupos = $this->getGrupo();
        if($grupos){
            // si hay grupo retornamos la vista con la lista de noneuser.
            return view('grupo.index',['grupos'=>$grupos,'image_url'=>$this->image_url]);
        }
        else{
            // de no haber grupo, puede que sea problema de la api
            // y redirigimos a la pagina principal.
            return redirect()->route('inicio');
        }
    }

    /**
     * Muestra el formulario para crear un nuevo noneuser.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornamos vista.
        return view('grupo.form',['create'=>true,'tipo_seguros'=>$this->tipo_seguros,'parentesco'=>$this->parentesco,'tipo_sangre'=>$this->tipo_sangre,'generos'=>$this->generos,'create'=>true]);
    }

    /**
     * enviar la solicitud de crear un nuevo noneuser a la aplicación de claroauth360.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar formulario
        $request->validate($this->rules,$this->message);
        // Obtener el grupo del usuario
        $grupos = $this->getGrupo();
        if($grupos){
            // creamos los headers y params a enviar.
            $options = $this->setOptions($request,$grupos['id']);
            try {
                // Realizar la petición a la api para crear un nuevo noneuser,
                $response = $this->client->request('POST','createNoneUser',$options);
                // SI hay respuesta, convertimos el contenido de la respuesta en un array.
                $contents = json_decode($response->getBody()->getContents());
                //Si la respuesta es: {"message": "Successfully created NoneUser!"} el usuario fue creado.
                if($response->getStatusCode() == 201 && $contents->message == "Successfully created NoneUser!"){
                    // Se lanza un evento sweet alert para que el usuario pueda observar que la acción
                    // se realizo correctamente y se ridige a la ruta index.
                    Alert::success('Personal Creado','El registro ha sido creado y ahora estan conectado con Protección Civil');
                    return redirect()->route('grupos.index');
                }
            } catch (\Exception $e) {
                // Si hay error por parte de la petición del cliente, se lanza un error al log; se 
                Log::error('GrupoController@store: '.(string)$e);
                // se envia un evento sweet alert para que el usuario sea informado que hay un error
                Alert::error('Error',"Error al guardar tu registro. Por favor, intentalo más tarde.");
                // y se redirige a la ruta index.
                return redirect()->route('grupos.index');
            }
        }
        else{
            // si no hay grupos, hay error en la petición y se redirigi al inicio
            return redirect()->route('inicio');
        }
    }

    /**
     * Muestra el formulario con la información para editar el noneuser con el token obtenido.
     *
     * @param  string  $token_id
     * @return \Illuminate\Http\Response
     */
    public function edit($token_id)
    {
        // Obtenemos el grupo del usuario
        $grupos = $this->getGrupo();
        if($grupos){
            // llamamos a la función para buscarl el none user con ese token
            $none_user = $this->findNoneUser($grupos['noneusers'],$token_id);
            if($none_user){
                // separar calle, numero, colonia, alcaldía y estado del campo dirección
                $direccion = explode(", ",$none_user['direccion']);
                // retornamos el formulario
                return view('grupo.form',['create'=>false,'none_user'=>$none_user,'direccion'=>$direccion,'tipo_seguros'=>$this->tipo_seguros,'parentesco'=>$this->parentesco,'tipo_sangre'=>$this->tipo_sangre,'generos'=>$this->generos]);
            }
            else{
                // Si no existe el none_user se crea un log de error,
                Log::error("GrupoController@edit: no se pudo encontrar el id $token_id");
                // Se crea un evento de sweet alert con el mensaje de que el usuario no fue encontrado
                Alert::error('No encontrado','este registro no existe. Favor de intentar con otro.');
                // Y se redirige a la ruta index.
                return redirect()->route('grupos.index');
            }
        }
        else{
            // Si no hay grupo se redirige al inicio.
            return redirect()->route('inicio');
        }
    }

    /**
     * enviar la solicitud de actualizar el noneuser con esa id a la aplicación de claroauth360.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validar el formulario.
        $request->validate($this->rules,$this->message);
        // obtenemos el grupo del usuario
        $grupos = $this->getGrupo();
        if($grupos){
            // Se crea el array con los headers y params para enviar la petición.
            // se envia el request, el id del grupo y el id del noneuser a actualizar.
            $options = $this->setOptions($request,$grupos['id'],$id);
            try {
                // Se realiza la petición con los parametros para actualizar el registro.
                $response = $this->client->request('POST','updateNoneuser',$options);
                // si hay respuesta la convertimos en un array
                $contents = json_decode($response->getBody()->getContents());
                // Si la respuesta es: {"message": "Successfully updated NoneUser!"} el usuario fue actualizado.
                if($response->getStatusCode() == 201 && $contents->message == "Successfully updated NoneUser!"){
                    // Se lanza el evento con sweet alert para informar al usuario que la actualización se realizo
                    // satisfactoriamente
                    Alert::success('Personal Actualizado','El registro ha sido actualizado y ahora estan conectado con Protección Civil');
                    // Y se redirige a la ruta de index 
                    return redirect()->route('grupos.index');
                }
            } catch (\Exception $e) {
                // Si hay un error con la petición se lanza un log de error con información del error.
                Log::error('GrupoController@update: '.(string)$e);
                // Se lanza el evento con sweet alert para notificar al clientes
                Alert::error('Error',"Error al actualizar tu registro. Por favor, intentalo más tarde.");
                // y se redirige al index.
                return redirect()->route('general.index');
            }
        }else{
            // Redirigir al inicio.
            return redirect()->route('inicio');
        }

    }

    /**
     * El servicio lanza un soft delete a la sesión 
     * para eliminar el noneuser desde la api.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //obtenemos el grupo
        $grupos = $this->getGrupo();
        if($grupos){
            // Se crea el array con los headers y params para enviar la petición.
            // El request es null, el id del grupo y el id del noneuser a actualizar
            // y la bandera de eliminar.
            $options = $this->setOptions(null,$grupos['id'],$id,true);
            try {
                // Se envia la petición a update pero con los parametros para eliminar
                $response = $this->client->request('POST','updateNoneuser',$options);
                // De haber respuesta se crea el array
                $contents = json_decode($response->getBody()->getContents());
                // Si la respuesta es: {"message": "Successfully updated NoneUser!"} el usuario fue eliminado.
                if($response->getStatusCode() == 201 && $contents->message == "Successfully updated NoneUser!"){
                    // se crea un evento sweet alert para notificar al usuario de la acción realizada
                    Alert::success('Personal Eliminado','El registro ha sido eliminado de Protección Civil');
                    // y redirigimos a la lista de grupos.
                    return redirect()->route('grupos.index');
                }
            } catch (\Exception $e) {
                // Si hay error por parte de la petición se envia un log de error
                Log::error('GrupoController@destroy: '.(string)$e);
                // Se notifica al usuario por sweet alert
                Alert::error('Error',"Error al eliminar tu registro. Por favor, intentalo más tarde.");
                // y se redirige a la ruta grupos index
                return redirect()->route('grupos.index');
            }
        }else{
            // Si no hay grupos se redirige al inicio
            return redirect()->route('inicio');
        }
    }

    /**
     * Muestra los none users del grupo en un pdf
     * con snappy.
     *
     * @return \SnappyPDF $pdf
     */
    public function pdfShow()
    {
        //Sacamos el grupo del usuario
        $grupos = $this->getGrupo();
        if($grupos){
            // Si existe el grupo creamos el pdf con información de los noneusers
            $pdf = SnappyPDF::loadView('pdf.grupos_snappy',['grupos'=>$grupos]);
            // Retornamos al pdf en linea
            return $pdf->stream('grupo_mi_familia.pdf');
        }else{
            // Si no existe grupos se redirige al inicio
            return redirect()->route('inicio');
        }
    }

     /**
     * Descarga los none users del grupo en un pdf
     * con snappy.
     *
     * @return \SnappyPDF $pdf
     */
    public function pdfDownload()
    {
        //Obtenemos el grupo del usuario.
        $grupos = $this->getGrupo();
        if($grupos){
            // Si el grupo existe creamos el pdf con información de los noneusers.
            $pdf = SnappyPDF::loadView('pdf.grupos_snappy',['grupos'=>$grupos]);
            // descargar el pdf.
            return $pdf->download('grupo_mi_familia.pdf');
        }else{
            // Si no existe grupos se redirige al inicio.
            return redirect()->route('inicio');
        }
    }
}
