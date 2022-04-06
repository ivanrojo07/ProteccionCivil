<?php

use Illuminate\Database\Seeder;

class TipoSangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_sangres')->insert([
        	['name'=>'AB+'],
            ['name'=>'AB-'],
            ['name'=>'A+'],
            ['name'=>'A-'],
            ['name'=>'B+'],
            ['name'=>'B-'],
            ['name'=>'O+'],
            ['name'=>'O-']
        ]);
    }
}
