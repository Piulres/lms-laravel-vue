<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b899270894e4RelationshipsToDatatrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datatrails', function(Blueprint $table) {
            if (!Schema::hasColumn('datatrails', 'trail_id')) {
                $table->integer('trail_id')->unsigned()->nullable();
                $table->foreign('trail_id', '12564_5b89927055bba')->references('id')->on('trails')->onDelete('cascade');
                }
                if (!Schema::hasColumn('datatrails', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '12564_5b89927058ee3')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datatrails', function(Blueprint $table) {
            
        });
    }
}
