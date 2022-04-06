<?php

namespace App\Http\Controllers\Maleta;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use SnappyPDF;

class MaletaController extends Controller
{

	/*
    |--------------------------------------------------------------------------
    | Maleta Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que crea y actualiza la maleta de vida. Y crea el pdf.
    |
    */

    /**
     * @var array $rules serie de reglas de validación para el
     * formulario para agregar un familiar.
     * @var array $message serie de mensajes personalizados para las validaciones
     * de formulario.
     */

    public $rules,$messages;

    /**
     * Asignando rules y message de validación 
     * de formulario.
     *
     * @return void
     */

    public function __construct()
    {
    	$this->rules = [
    		'medicamentos'=>'nullable|boolean',
	    	'guantes'=>'nullable|boolean',
	    	'algodon'=>'nullable|boolean',
	    	'cinta_adhesiva'=>'nullable|boolean',
	    	'termometro'=>'nullable|boolean',
	    	'antiseptico'=>'nullable|boolean',
	    	'gasas'=>'nullable|boolean',
	    	'tijeras'=>'nullable|boolean',
	    	'yodo'=>'nullable|boolean',
	    	'curitas'=>'nullable|boolean',
	    	'vendas'=>'nullable|boolean',
	    	'cubrebocas'=>'nullable|boolean'
    	];
    	$this->messages=[
    		'boolean'=>'El campo solo puede ser verdadero o falso'
    	];
    }

    /**
     * Crea o actualiza la maleta de vida para el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    	// Validar el formulario 
    	$request->validate($this->rules,$this->messages);
    	// Obteniendo el usuario logeado
    	$user = Auth::user();
    	// Agregar o actualizar el registro Maleta dentro de la relación usuario.
    	$user->maleta()->updateOrCreate(['user_id'=>$user->id],[
    		// Si existe el request solicitado manda verdadero, de lo contrario falso.
    		'medicamentos'=>($request->medicamentos ? true : false),
	    	'guantes'=>($request->guantes ? true : false),
	    	'algodon'=>($request->algodon ? true : false),
	    	'cinta_adhesiva'=>($request->cinta_adhesiva ? true : false),
	    	'termometro'=>($request->termometro ? true : false),
	    	'antiseptico'=>($request->antiseptico ? true : false),
	    	'gasas'=>($request->gasas ? true : false),
	    	'tijeras'=>($request->tijeras ? true : false),
	    	'yodo'=>($request->yodo ? true : false),
	    	'curitas'=>($request->curitas ? true : false),
	    	'vendas'=>($request->vendas ? true : false),
	    	'cubrebocas'=>($request->cubrebocas ? true : false)
	    ]);
	    // Crear una alerta al usuario de que la acción se realizo.
	    Alert::success('Maleta de vida','Maleta de vida registrada');
	    // Redirigir a la ruta plan familiar.
    	return redirect()->route('planfamiliar');
    }

    /**
     * Muestra el pdf con el formato de maleta de vida ya llenado con el registro.
     *
     * @return \Illuminate\Http\Response
     */

    public function showSnappyPDF()
    {
    	// Obteniendo el usuario logeado.
    	$user = Auth::user();
    	// Obteniendo la maleta de vida del usuario
    	$maleta = $user->maleta;
    	// Crear el pdf con Snappy e inyectamos los datos
    	$pdf = SnappyPDF::loadView('pdf.botiquin_maleta_snappy',['nombre'=>"Maleta de vida",'elemento'=>$maleta])->setPaper('a4')->setOrientation('landscape');
    	// Retornamos el pdf en el navegador.
    	return $pdf->stream('maleta.pdf');

    }

    /**
     * Muestra el pdf con el formato de maleta de vida vacio.
     *
     * @return \Illuminate\Http\Response
     */

    public function showSnappyEmptyPDF()
    {
    	// Crear el pdf con Snappy, cargando una vista predeterminada
    	$pdf = SnappyPDF::loadView('pdf.botiquin_maleta_snappy',['nombre'=>"Maleta de vida",'elemento'=>null])->setPaper('a4')->setOrientation('landscape');
    	// Retornamos el pdf en el navegador.
    	return $pdf->stream('maleta.pdf');

    }
}
