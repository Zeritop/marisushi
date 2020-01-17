<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user_registra_compra');
            $table->string('nombre_registra_compra');
            $table->string('nombre_retira');
            $table->bigInteger('telefono');
            $table->dateTime('fecha_entrega');
            $table->string('estado');
            $table->text('observacion')->nullable();
            $table->integer('precio_total_sin_descuento');
            $table->integer('descuento')->nullable();
            $table->boolean('descuento_aplicado');
            $table->integer('precio_total_con_descuento');
            $table->string('seccion');
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
        Schema::dropIfExists('orders');
    }
}
