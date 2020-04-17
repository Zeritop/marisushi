<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteIndexIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        //
        public function up()
    {
        Schema::table('ingredients', function(Blueprint $table)
        {
            $table->dropUnique('ingredients_name_unique');

        });

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
