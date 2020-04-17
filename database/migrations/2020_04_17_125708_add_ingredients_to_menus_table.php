<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIngredientsToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->string('secundario3')->after('secundario2')->nullable();
            $table->string('secundario4')->after('secundario3')->nullable();
            $table->string('secundario5')->after('secundario4')->nullable();
            $table->string('secundario6')->after('secundario5')->nullable();
            $table->string('secundario7')->after('secundario6')->nullable();
            $table->string('secundario8')->after('secundario7')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->dropColumn('secundario3');
            $table->dropColumn('secundario4');
            $table->dropColumn('secundario5');
            $table->dropColumn('secundario6');
            $table->dropColumn('secundario7');
            $table->dropColumn('secundario8');
        });
    }
}
