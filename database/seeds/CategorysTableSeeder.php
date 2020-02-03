<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorys')->insert([
            'name' => 'Esencial',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Principal',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Secundarios',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Envoltura',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Otros',
        ]);


    }
}
