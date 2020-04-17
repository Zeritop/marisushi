<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoremoreingredientsToMenusTable extends Migration
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
            $table->string('envolturaExterna2')->after('envolturaExterna')->nullable();
            $table->string('envolturaExterna3')->after('envolturaExterna2')->nullable();
            $table->string('envolturaExterna4')->after('envolturaExterna3')->nullable();

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
            $table->dropColumn('envolturaExterna2');
            $table->dropColumn('envolturaExterna3');
            $table->dropColumn('envolturaExterna4');
        });
    }
}
