<?php

use Illuminate\Database\Seeder;

class TipoRiesgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_riesgos')->insert([
        	[
        		'name'=>'Alto'
        	],
        	[
        		'name'=>'Medio'
        	],
        	[
        		'name'=>'Bajo'
        	]
        ]);
    }
}
