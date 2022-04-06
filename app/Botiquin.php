<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Botiquin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'medicamentos',
    	'guantes',
    	'algodon',
    	'cinta_adhesiva',
    	'termometro',
    	'antiseptico',
    	'gasas',
    	'tijeras',
    	'yodo',
    	'curitas',
    	'vendas',
    	'cubrebocas'
    ];

    //PORCENTAJE DEL BOTIQUIN
    public function getPorcentajeAttribute()
    {
    	$porcent = 0;
        foreach ($this->fillable as $campo) {
            if($this[$campo] == true){
                $porcent += 8.33;
            }
        }
        if($porcent >= 99.9){
            return 100;
        }
        else{
            return round($porcent,2);

        }

    }

    //Relación con tabla pivote
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
