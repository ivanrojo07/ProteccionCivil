<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_parentescos')->insert([
        	[
        		'name'=>'Madre',
        	],
        	[
        		'name'=>'Padre',
        	],
        	[
        		'name'=>'Madrastra',
        	],
        	[
        		'name'=>'Padrastro',
        	],
        	[
        		'name'=>'Hermano (a)',
        	],
        	[
        		'name'=>'Abuelo (a)',
        	],
        	[
        		'name'=>'Nieto (a)',
        	],
        	[
        		'name'=>'Esposo (a)',
        	],
        	[
        		'name'=>'Pareja',
        	],
        	[
        		'name'=>'Sobrino (a)',
        	],
        	[
        		'name'=>'Primo (a)',
        	],
        	[
        		'name'=>'Familiar político',
        	],
        	[
        		'name'=>'Otro familiar',
        	],
        	[
        		'name'=>'Conocido',
        	],
        ]);
    }
}
