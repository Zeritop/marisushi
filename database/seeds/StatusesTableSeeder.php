<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            'name' => 'Pendiente',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Listo para Retirar',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Cancelado',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Pagado',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Entregado',
        ]);

        
    }
}
