<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Familia extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'nombre',
    	'apellido_p',
		'apellido_m',
		'f_nac',
		'alergias',
		'enfermedades',
        'genero',
		'tipo_sanguineo',
		'nombre_emergencia',
		'parentesco_emergencia',
		'telefono_emergencia',
		'numero_seguro',
		'tipo_seguro',
		'discapacidad',
		'tipo_discapacidad',
		'foto_perfil'
    ];

    /**
     * Mutador que cambia el formato de nombre en formato Capitalization.
     *
     * @param  string  $value
     * @return void
     */
    public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucwords(strtolower($value));
    }

    /**
     * Mutador que cambia el formato de Apellido Paterno en formato Capitalization.
     *
     * @param  string  $value
     * @return void
     */
    public function setApellidoPAttribute($value){
        $this->attributes['apellido_p'] = ucwords(strtolower($value));
    }
    /**
     * Mutador que cambia el formato de Apellido Materno en formato Capitalization.
     *
     * @param  string  $value
     * @return void
     */
    public function setApellidoMAttribute($value){
        $this->attributes['apellido_m'] = ucwords(strtolower($value));
    }

    // Atributo edad calculando por fecha de nacimiento
    public function getEdadAttribute()
    {
    	if ($this->f_nac) {
    		# code...
    		return Carbon::createFromFormat('Y-m-d',$this->f_nac)->age;
    	}
    	else{
    		return 0;
    	}
    }
    // atributo de nombre completo
    public function getFullNameAttribute()
    {
        return $this->nombre.' '.ucfirst($this->apellido_p).' '.ucfirst($this->apellido_m);
    }
    //Relación con tabla pivote
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    //Relación con la institución de seguro
    // public function seguro()
    // {
    //     return $this->belongsTo('App\TipoSeguro','tipo_seguro_id');
    // }
}
