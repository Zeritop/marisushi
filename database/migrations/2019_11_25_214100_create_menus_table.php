<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto')->nullable();
            $table->string('titulo');
            $table->string('descripcion')->nullable();
            $table->integer('precio');
            $table->string('esencial')->nullable();
            $table->string('principal')->nullable();
            $table->string('secundario1')->nullable();
            $table->string('secundario2')->nullable();
            $table->string('envoltura')->nullable();
            $table->string('ingrediente1')->nullable();
            $table->string('ingrediente2')->nullable();
            $table->string('ingrediente3')->nullable();
            $table->string('ingrediente4')->nullable();
            $table->string('ingrediente5')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
