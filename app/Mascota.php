<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'nombre_mascota',
		'edad',
		'raza',
		'numero_registro',
		'aviso_emergencia',
		'telefono_emergencia',
		'foto_mascota',
        'sexo_mascota'
    ];

    // relacion con tabla pivote
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
