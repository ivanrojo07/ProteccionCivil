<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_seguros')->insert([
                	[
                		'nombre'=>'IMSS',
                		'publico'=>true,
                	],[
                		'nombre'=>'ISSSTE',
                		'publico'=>true,
                	],[
                		'nombre'=>'Seguro Popular',
                		'publico'=>true,
                	],[
                		'nombre'=>'SEDENA',
                		'publico'=>true,
                	],[
                		'nombre'=>'SEMAR',
                		'publico'=>true,
                	],[
                		'nombre'=>'Institucional',
                		'publico'=>false,
                	],[
                		'nombre'=>'Gastos Médicos Mayores',
                		'publico'=>false,
                	],[
                		'nombre'=>'Accidentes Personales',
                		'publico'=> false,
                	],[
                		'nombre'=>'Hospitalización',
                		'publico'=>false,
                	],[
                		'nombre'=>'Reembolso',
                		'publico'=>false,
                	],[
                		'nombre'=>'Indemnización',
                		'publico'=>false,
                	],[
                		'nombre'=>'Otro',
                		'publico'=>null,
                	]
                ]);
    }
}
