<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_menuItems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_menu_item');
            $table->integer('cantidad');
            $table->integer('precio');
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
        Schema::dropIfExists('orders_menuItems');
    }
}
