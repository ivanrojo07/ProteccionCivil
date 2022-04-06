<?php

namespace App\Http\Controllers\Dashboard;

use App\DatoGeneral;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | Presenta vista inicial de "Mi familia" 
    | en el hadle dashboard.
    |
    */

   	/**
     * Mi familia, vista datos generales,
     * datos de mi familia y lista de familiares.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
    	// Obtenemos al usuario logeado.
        $user = Auth::user();
        // Obtenemos el dato general/dirección del usuario
        $dato_general=$user->dato_general;
        // Obtenemos los familiares del usuario.
        $familiares = $user->familiares()->orderBy('id','asc')->get();
        // Retornamos la vista.
		return view('dashboard.index',['user'=>$user,'dato_general'=>$dato_general,'familiares'=>$familiares]);
    	
    }
}
