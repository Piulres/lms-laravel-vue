<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89834e393ebRelationshipsToTrailsdatumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trailsdatas', function(Blueprint $table) {
            if (!Schema::hasColumn('trailsdatas', 'trail_id')) {
                $table->integer('trail_id')->unsigned()->nullable();
                $table->foreign('trail_id', '12559_5b89834de678c')->references('id')->on('trails')->onDelete('cascade');
                }
                if (!Schema::hasColumn('trailsdatas', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '12559_5b89834debcea')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('trailsdatas', function(Blueprint $table) {
            
        });
    }
}
