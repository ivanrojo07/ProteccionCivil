<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoGeneral extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'calle',
    	'codigo_postal',
    	'colonia',
    	'alcaldia',
    	'estado',
    	'pisos_hogar',
    	'numero_exterior',
    	'numero_interior',
    	'zona_riesgo',
    ];
    //Relación con tabla pivote
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
