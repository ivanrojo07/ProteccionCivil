<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token','expires_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'password', 'remember_token',
    ];

    /**
     * Mutador que cambia el formato de nombre en formato Capitalization.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    // ATRIBUTOS CANTIDAD DE NIÑOS EN LA FAMILIA -18
    public function getNinosAttribute()
    {
        $count = 0;
        foreach ($this->familiares as $persona) {
            if($persona->f_nac && $persona->edad < 18){
                $count +=1;
            }
        }
        return $count;
    } 
    // CANTIDAD DE ADULTOS EN LA FAMILIA +18
    public function getAdultosAttribute()
    {
        $count = 0;
        foreach ($this->familiares as $persona) {
            if($persona->f_nac && $persona->edad >= 18){
                $count +=1;
            }
        }
        return $count;
    }
    // CANTIDAD DE PERSONAS CON CAPACIDADES DIFERENTES EN LA FAMILIA
    public function getCapacidadDiferenteAttribute()
    {
        $count = 0;
        foreach ($this->familiares as $persona) {
            if($persona->discapacidad){
                $count +=1;
            }
        }
        return $count;
    }
    // CANTIDAD DE PERSONAS DE LA TERCERA EDAD EN LA FAMILIA
    public function getTerceraEdadAttribute()
    {
        $count = 0;
        foreach ($this->familiares as $persona) {
            if($persona->f_nac && $persona->edad >= 65){
                $count +=1;
            }
        }
        return $count;
    }

    //Progreso en porcentaje de FICHA DE SEGURIDAD
    public function getFichaSeguridadProgressAttribute()
    {
        $porcent = 0;
        if($this->dato_general){
            $porcent +=50;
        }
        if(!$this->familiares->isEmpty()){
            $porcent +=50;
        }
        return $porcent;
    }

    // Progreso en porcentaje de plano externo e interno
    public function getPlanoInternoExternoProgressAttribute()
    {
        if ($this->planos) {
            return $this->planos->porcentaje;
        } else {
            return 0;
        }
    }
    // Progreso en porcentaje de plano externo e interno
    public function getBotiquinProgressAttribute()
    {
        if ($this->botiquin) {
            return $this->botiquin->porcentaje;
        } else {
            return 0;
        }

    }
    // Progreso en porcentaje de plano externo e interno
    public function getMaletaProgressAttribute()
    {
        if($this->maleta){
            return $this->maleta->porcentaje;
        }
        else{
            return 0;
        }

    }

    // Progreso en porcentaje TOTAL
    public function getProgressBarAttribute(){
        $porcent = 0;
        // calcular porcentaje de FICHA DE SEGURIDAD
        $porcent += $this->ficha_seguridad_progress*0.25;
        // calcular porcentaje de PLANO INTERNO Y EXTERNO
        $porcent += $this->plano_interno_externo_progress*0.25;
        // calcular porcentaje de botiquin
        $porcent += $this->botiquin_progress*0.25;
        // calcular porcentaje de maleta
        $porcent += $this->maleta_progress*0.25;
        return round($porcent,2);
    }

    // TOTAL DE FAMILIA
    public function getPersonasAttribute()
    {
        return sizeof($this->familiares);
    }
    //Relación con familiares
    public function familiares(){
        return $this->hasMany('App\Familia');
    }
    // Relación con mascotas
    public function mascotas(){
        return $this->hasMany('App\Mascota');
    }
    // Relación con dato general/dirección
    public function dato_general(){
        return $this->hasOne('App\DatoGeneral');
    }
    // Relación con botiquin
    public function botiquin()
    {
        return $this->hasOne('App\Botiquin');
    }    
    // Relación con maleta
    public function maleta()
    {
        return $this->hasOne('App\Maleta');
    }
    // Relación con planos
    public function planos()
    {
        return $this->hasOne('App\Plano');
    }
}
