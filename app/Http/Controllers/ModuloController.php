<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class ModuloController extends Controller
{
    //

    public function showForm(Request $request)
    {
    	$body = $request->session()->get('body');
    	if(!empty($body['claro360'])){
			return view('modulo.form');
		}
		else{
			// Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            return redirect('/login')->with('mensaje-error','Usuario no encontrado, por favor intente más tarde.');
		}
    }

    public function submitForm(Request $request)
    {
    	$claro360 =  $request->session()->get('body.claro360');
		if(!empty($claro360)){
			$user = User::where('email',$claro360['correo'])->first();
			if(!$user){
				$user = new User([
                            'name' => $claro360['nombre'],
                            "email" => $claro360['correo'],
                            // "claro_token" =>$claro360['token']

                        ]);
				$user->id = $claro360['id'];
				$user->save();
			}
			$modulo = [
	            "id360" => $claro360['id'],
	            "modulo" => "plan_interno",
	            "activo" => '1'
	        ];
	        try{
	        	$url=env("GLOBAL_API_URL");
        		$apiUrl=$url.'CONTROLADOR/API/cuenta360/'; // Cuenta usuarios 360
        		$client = new GuzzleClient(['base_uri'=>$apiUrl]);
        		$response = $client->request('POST', 'registro_modulo',
	            [
	                'body' => json_encode($modulo),
	                'headers' => ["Content-Type"=>"application/json"]
	            ]);
	            // Si hay respuesta correcta se guarda en una variable.
            	$contents = json_decode($response->getBody()->getContents(),true);
            	
            	if ($contents['success']) {
            		// session()->flush();
            		auth()->login($user,false);
            		return redirect()->route('inicio');
            	}
            	else{
            		return('/login')->with('error',"No se pudo registrar el modulo");
            	}

	        }
	        catch(Exception $e){
	        	// Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            	return redirect('/login')->with('error',$e->message);
	        }

		}
		else{
			// Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            return redirect('/login')->with('mensaje-error','Usuario no encontrado, por favor intente más tarde.');
		}
    }
}
