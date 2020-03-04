<?php

use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('measurements')->insert([
            'name' => 'Kilogramos',
        ]);

        DB::table('measurements')->insert([
            'name' => 'Unidades',
        ]);
    }
}
