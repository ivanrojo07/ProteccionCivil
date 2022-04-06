<?php

namespace App\Http\Controllers\DatoGeneral;

use App\DatoGeneral;
use App\Familia;
use App\Http\Controllers\Controller;
use App\TipoParentesco;
use App\TipoRiesgo;
use App\TipoSangre;
use App\TipoSeguro;
use App\User;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DatoGeneralController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dato General Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que muestra los formularios para agregar 
    | o modificar el dato general del usuario.
    |
    */
    public $rules, $message, $tipo_seguros, $parentesco, $tipo_sangre, $generos, $riesgos;
    /**
     * Agregando rules y message de validación de formulario.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rules = [
            'calle'=>'required|string|max:50',
            'codigoPostal'=>'nullable|numeric|min:1|max:999999',
            'colonia'=>'required|string|max:75',
            'alcaldia'=>'required|string|max:50',
            'estado'=>'required|string|max:50',
            'numero_pisos'=>'nullable|numeric|min:0|max:99',
            'numeroInt'=>'nullable|alpha_num|max:3',
            'numeroExt'=>'nullable|alpha_num|min:1|max:8',
            'riesgo'=>'nullable|string|in:Alto,Medio,Bajo',
        ];
        $this->message = [
            'required'=>'El campo :attribute es requerido.',
            'string'=>'El campo :attribute debe ser texto',
            'max'=>'El campo :attribute debe ser maximo de :max caracteres',
            'numeric'=>'El campo :attribute debe ser númerico',
            'alpha_num'=>'El campo :attribute debe ser alfanuméricos',
            'in'=> 'El campo :attribute debe tener alguno de estos valores: :values',
            'exists'=>'Valor no valido',
        ];
        $this->tipo_seguros = TipoSeguro::orderBy('nombre','asc')->get();
        $this->parentesco = TipoParentesco::orderBy('id','asc')->get();
        $this->tipo_sangre= TipoSangre::orderBy('id','asc')->get();
        $this->generos=[
            'Masculino',
            'Femenino'
        ];
        $this->riesgos=TipoRiesgo::orderBy('id','asc')->get();
    }

    /**
     * Muestra uno de dos fomularios (para agregar el dato
     * general del usuario o agregar tambien un miembro de
     * la familia).
     *
     * @return \Illuminate\Http\Response
     */
    public function registroform(){
        // Obteniendo el usuario logeado.
    	$user = Auth::user();
        // Obteniendo el dato general del usuario.
    	$dato_general = $user->dato_general;
        if(empty($dato_general)){
            // si no hay datos generales
            if ($user->familiares->isEmpty()) {
                // No tiene dirección ni familiares, se crea formulario para que agregue ambos
                return view('dato_general.form_inicial',['tipo_seguros'=>$this->tipo_seguros,'parentesco'=>$this->parentesco,'tipo_sangre'=>$this->tipo_sangre,'generos'=>$this->generos,'riesgos'=>$this->riesgos]);
            } else { 
                //Ya tiene por lo menos un familiar, se muestra formulario para dirección
                return view('dato_general.form',['create'=>true]);
            }
        }
        else{
            //Ya tiene direccion y por lo menos un familiar
            return redirect()->route('dashboard');
        }
    }

    public function create(Request $request){
        // Obteniendo el usuario logeado.
        $user = Auth::user();
        // Validación de formulario.
        $request->validate($this->rules,$this->message);
        // Crear modelo DatoGeneral.
        $dato_general = new DatoGeneral([
    		'calle'=>$request->calle,
    		'codigo_postal'=>$request->codigoPostal,
    		'colonia'=>$request->colonia,
	    	'alcaldia'=>$request->alcaldia,
	    	'estado'=>$request->estado,
	    	'pisos_hogar'=>$request->numero_pisos,
	    	'numero_exterior'=>$request->numeroExt,
	    	'numero_interior'=>$request->numeroInt,
	    	'zona_riesgo'=>$request->riesgo,
    	]);
        // guarda el modelo en la relación del usuario. 
    	$user->dato_general()->save($dato_general);
        // Un evento de sweet alert para notificar al usuario que el evento ha sido guardado.
        Alert::success('Datos Generales Agregado','Los datos generales han sido agregados y ahora estan conectados con Protección Civil');
        // Redirigir a la ruta dashboard.
    	return redirect()->route('dashboard');
    }

    public function edit(){
        // Obteniendo el usuario logeado.
        $user = Auth::user();
        // Obteniendo el dato_general del usuario
        $dato_general = $user->dato_general;
        if($dato_general){
            // mostramos formulario solo de dato general
            return view('dato_general.form',['create'=>false,'dato_general'=>$dato_general]);
        }
        else{
            // Si no hay dato general retornar al formulario de dato general
            return redirect()->route('dato_general.form');
        }

    }

    public function update(Request $request){
        // Obtener el usuario logeado
        $user = Auth::user();
        // validar si el formulario
        $request->validate($this->rules,$this->message);
        // Obtenemos el dato general del usuario
        $dato_general = $user->dato_general;
        // actualizamos el registro
        $dato_general->update([
            'calle'=>$request->calle,
            'codigo_postal'=>$request->codigoPostal,
            'colonia'=>$request->colonia,
            'alcaldia'=>$request->alcaldia,
            'estado'=>$request->estado,
            'pisos_hogar'=>$request->numero_pisos,
            'numero_exterior'=>$request->numeroExt,
            'numero_interior'=>$request->numeroInt,
            'zona_riesgo'=>$request->riesgo,
        ]);
        // lanzar el evento de sweet alert con actualización
        Alert::success('Datos Generales Actualizados','Los datos generales han sido actualizados y ahora estan conectados con Protección Civil');
        // redirigir a la pagina de dashboard
        return redirect()->route('dashboard');


    }

    public function registroInicial(Request $request)
    {
        $user = Auth::user();
        /*AGREGANDO MÁS VALIDACIONES PARA EL FORMULARIO INICIAL*/
        $rules_inicial = $this->rules;
        $rules_inicial['imagen'] = 'nullable|string';
        $rules_inicial['nombre'] = 'required|string|regex:/^[\pL\s\-]+$/u';
        $rules_inicial['apellido_p'] = 'nullable|string|regex:/^[\pL\s\-]+$/u';
        $rules_inicial['apellido_m'] = 'nullable|string|regex:/^[\pL\s\-]+$/u';
        $rules_inicial['edad'] = 'nullable|date|before:'.date('Y-m-d');
        $rules_inicial['alergias'] = 'nullable|string|max:50';
        $rules_inicial['enfermedades'] = 'nullable|string|max:50';
        $rules_inicial['tipo_sanguineo'] = 'nullable|string|exists:tipo_sangres,name';
        $rules_inicial['genero'] = 'nullable|string|in:Masculino,Femenino';
        $rules_inicial['numero_seguro'] = 'nullable|string|max:25';
        $rules_inicial['tipo_seguro'] = 'nullable|string|exists:tipo_seguros,nombre';
        $rules_inicial['nombre_emergencia'] = 'nullable|string|max:50';
        $rules_inicial['parentesco'] = 'nullable|string|exists:tipo_parentescos,name';
        $rules_inicial['telefono'] = 'nullable|numeric|min:1|max:9999999999';
        $rules_inicial['discapacidad'] = 'nullable|boolean';
        $rules_inicial['cual'] = 'nullable|string|max:50';
        // VALIDANDO EL FORMULARIO
        $request->validate($rules_inicial,$this->message);
        // CREAMOS UN NUEVO MODELO DATO GENERAL
        $dato_general = new DatoGeneral([
            'calle'=>$request->calle,
            'codigo_postal'=>$request->codigoPostal,
            'colonia'=>$request->colonia,
            'alcaldia'=>$request->alcaldia,
            'estado'=>$request->estado,
            'pisos_hogar'=>$request->numero_pisos,
            'numero_exterior'=>$request->numeroExt,
            'numero_interior'=>$request->numeroInt,
            'zona_riesgo'=>$request->riesgo,
        ]);
        // GUARDANDO EL DATO GENERAL EN EL USUARIO
        $user->dato_general()->save($dato_general);
        // CREANDO UN NUEVO MODELO FAMILIA
        $familia = new Familia([
            'nombre'=>$request->nombre,
            'apellido_p'=>$request->apellido_p,
            'apellido_m'=>$request->apellido_m,
            'f_nac'=>$request->edad,
            'alergias'=>$request->alergias,
            'enfermedades'=>$request->enfermedades,
            'tipo_sanguineo'=>$request->tipo_sanguineo,
            'genero'=>$request->genero,
            'nombre_emergencia'=>$request->nombre_emergencia,
            'parentesco_emergencia'=>$request->parentesco,
            'telefono_emergencia'=>$request->telefono,
            'numero_seguro'=>$request->numero_seguro,
            'tipo_seguro'=>$request->tipo_seguro,
            'discapacidad'=>$request->discapacidad,
            'tipo_discapacidad'=>$request->cual,
            'foto_perfil'=>$request->imagen
        ]);
        // GUARDANDO EL FAMILIAR EN EL USUARIO
        $user->familiares()->save($familia);
        if($request->responsable == "on"){
            // SI CHECKBOX RESPONSABLE ESTA ACTIVO SE LE ASIGNA A ESE FAMILIAR EL RESPONSABLE DEL PLAN
            foreach ($user->familiares as $fam) {
                // RECORRER LOS FAMILIARES
                if($fam->id == $familia->id){
                    // SI LLEGAMOS AL FAMILIAR LE DAMOS VALOR DE RESPONSABLE Y GUARDAMOS
                    $fam->responsable = 1;
                    $fam->save();
                }
                else{
                    // LES DAMOS FALSO A LOS DEMAS FAMILIARES
                    $fam->responsable = 0;
                    $fam->save();
                }
            }
        }
        // SE LANZA UNA ALERTA AL USUARIO DE QUE LA ACCIÓN SE REALIZO
        Alert::success('Datos Generales Agregado','Los datos generales han sido agregados y ahora estan conectados con Protección Civil');
        // Y SE REDIRECCIONA AL DASHBOARD
        return redirect()->route('dashboard');

    }
}
