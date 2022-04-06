<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'plano_interno',
    	'plano_externo',
    	'user_id'
    ];
    //Relación con tabla pivote
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    //PORCENTAJE DEL Plan
    public function getPorcentajeAttribute()
    {
    	$porcent = 0;
    	// si tiene registro del plano interno sumar 50
    	if($this->plano_interno){
    		$porcent +=50;
    	}
    	// si tiene registro del plano externo sumar 50
    	if($this->plano_externo){
    		$porcent +=50;
    	}

    	return $porcent;

    }
}
