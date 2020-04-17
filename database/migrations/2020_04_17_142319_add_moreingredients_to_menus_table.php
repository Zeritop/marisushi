<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreingredientsToMenusTable extends Migration
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
            $table->string('principal2')->after('principal')->nullable();
            $table->string('principal3')->after('principal2')->nullable();
            $table->string('principal4')->after('principal3')->nullable();
            $table->string('secundario9')->after('secundario8')->nullable();
            $table->string('secundario10')->after('secundario9')->nullable();
            $table->string('secundario11')->after('secundario10')->nullable();
            $table->string('secundario12')->after('secundario11')->nullable();

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
            $table->dropColumn('principal2');
            $table->dropColumn('principal3');
            $table->dropColumn('principal4');
            $table->dropColumn('secundario9');
            $table->dropColumn('secundario10');
            $table->dropColumn('secundario11');
            $table->dropColumn('secundario12');
        });
    }
}
