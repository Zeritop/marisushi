<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ingredients')->insert([
            'name' => 'Arroz',
            'categoria' => 'Esencial',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Pollo',
            'categoria' => 'Principal',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Kanikama',
            'categoria' => 'Principal',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Palta',
            'categoria' => 'Secundarios',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Queso Crema',
            'categoria' => 'Secundarios',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Nori',
            'categoria' => 'Envoltura interna',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Panko',
            'categoria' => 'Envoltura externa',
        ]);
    }
}
