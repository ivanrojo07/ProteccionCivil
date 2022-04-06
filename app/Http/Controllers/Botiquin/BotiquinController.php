<?php

namespace App\Http\Controllers\Botiquin;

use App\Http\Controllers\Controller;
use App\User;
use Alert;
use SnappyPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BotiquinController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Botiquin Controller
    |--------------------------------------------------------------------------
    |
    | Controlador para guardar y actualizar plantilla 
    | del botíquin de primeros auxilios.
    |
    */

    /**
     * Multiples variables del controlador.
     * @var array $rules: Lista de reglas de validación
     * para el formulario del botiquin.
     * @var array $messages: Lista de mensajes de error
     * para mostrarlo en la lista
     */
    public $rules,$messages;

    /**
     * Create a new controller instance.
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
    	$this->messages = [
    		'boolean'=>'El campo solo puede ser verdadero o falso'
    	];

    }
    /**
     * Crea o actualiza el botiquin del usuario.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// Validación del formulario
    	$request->validate($this->rules,$this->messages);
    	// Si es valido, obtenemos el usuario
		$user = Auth::user();
		// Actualizamos el botiquin del usuario
		// (si existe, de lo contrario crea un nuevo 
		// registro)
		$user->botiquin()->updateOrCreate([
				'user_id'=>$user->id//si existe
				// un botiquin con el mismo id de 
				// usuario
			],[
				// Si el request existe es checked.
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
		    ]
		);
		// Si se actualizo/creo se lanza un evento sweet alert
		// confirmando la acción a realizar.
	    Alert::success('Botiquín de Primeros Auxilios','Botiquín de Primeros Auxilios Actualizado');
	    // Redirigir a la ruta plan familiar.
    	return redirect()->route('planfamiliar');
    }

    /**
     * Muestra el botiquin creado en formato pdf.
     *
     * @return SnappyPDF::class->stream()
     */
    public function showSnappyPDF()
    {
    	// Obtenemos el usuario autenticado
    	$user = Auth::user();
    	// Obtenemos su botiquin
    	$botiquin = $user->botiquin;
    	// Cargamos el pdf inyectando el botiquin
    	$pdf = SnappyPDF::loadView('pdf.botiquin_maleta_snappy',['nombre'=>"Botiquín de Primeros Auxilios",'elemento'=>$botiquin])->setPaper('a4')->setOrientation('landscape');
    	// Retornamos el pdf
    	return $pdf->stream('botiquin.pdf');

    }

    /**
     * Muestra la plantilla vacia del botiquin en formato pdf.
     *
     * @return SnappyPDF::class->stream()
     */
    public function showSnappyEmptyPDF()
    {
    	// Cargamos el pdf (solo la plantilla)
    	$pdf = SnappyPDF::loadView('pdf.botiquin_maleta_snappy',['nombre'=>"Botiquín de Primeros Auxilios",'elemento'=>null])->setPaper('a4')->setOrientation('landscape');
    	// Retornamos el pdf
    	return $pdf->stream('botiquin.pdf');

    }
}
