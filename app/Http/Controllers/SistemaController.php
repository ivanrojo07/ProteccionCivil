<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SistemaController extends Controller
{

	/*
    |--------------------------------------------------------------------------
    | Sistema Controller
    |--------------------------------------------------------------------------
    |
    | Controlador de inicio, que muestra las landing pages.
    |
    */

	/**
     * Muestra la landing page inicial de la plataforma.
     *
     * @return \Illuminate\Http\Response
     */
	public function inicio(){
		// Obtenemos el usuario para obtener datos del progress bar.
		$user = Auth::user();
		// Mostramos la vista
		return view('inicio.index',['user'=>$user]);
	}

	/**
     * Muestra la landing page del plan familiar de la plataforma.
     *
     * @return \Illuminate\Http\Response
     */
	public function planfamiliar(){
		// Obtenemos el usuario para obtener datos del progress bar.
		$user = Auth::user();
		// Mostramos la vista
		return view('inicio.plan_familiar',['user'=>$user]);
	}

	/**
     * Muestra la landing page del plan actua de la plataforma.
     *
     * @return \Illuminate\Http\Response
     */
	public function planactua(){
		// Obtenemos el usuario para obtener datos del progress bar.
		$user = Auth::user();
		// Mostramos la vista
		return view('inicio.plan_actua',['user'=>$user]);
	}
}