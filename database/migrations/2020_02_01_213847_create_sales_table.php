<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_pago');
            $table->string('tipo_documento'); //para distinguir boleta o factura
            $table->string('metodo_pago');
            $table->string('rut')->nullable(); //transferencia bancaria
            $table->string('nombre_empresa')->nullable();
            $table->string('rut_empresa')->nullable();
            $table->unsignedBigInteger('precio_total');
            $table->unsignedBigInteger('id_pedido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
