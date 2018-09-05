<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b8982713ae36TrailTrailscategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('trail_trailscategory')) {
            Schema::create('trail_trailscategory', function (Blueprint $table) {
                $table->integer('trail_id')->unsigned()->nullable();
                $table->foreign('trail_id', 'fk_p_12555_12554_trailsca_5b8982713aee7')->references('id')->on('trails')->onDelete('cascade');
                $table->integer('trailscategory_id')->unsigned()->nullable();
                $table->foreign('trailscategory_id', 'fk_p_12554_12555_trail_tr_5b8982713af2f')->references('id')->on('trailscategories')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trail_trailscategory');
    }
}
