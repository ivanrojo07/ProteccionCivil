<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSeguro extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'nombre',
    	'publico'
    ];


    public function familias()
    {
    	return $this->hasMany('App\Familia');
    }



}
