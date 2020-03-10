<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalizars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('esencial1');
            $table->string('esencial2');
            $table->string('esencial3');
            $table->string('principal');
            $table->string('secundario1');
            $table->string('secundario2');
            $table->string('envoltura');
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
        Schema::dropIfExists('personalizars');
    }
}
