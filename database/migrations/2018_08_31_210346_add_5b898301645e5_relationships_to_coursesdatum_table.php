<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b898301645e5RelationshipsToCoursesdatumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coursesdatas', function(Blueprint $table) {
            if (!Schema::hasColumn('coursesdatas', 'course_id')) {
                $table->integer('course_id')->unsigned()->nullable();
                $table->foreign('course_id', '12557_5b8983012950d')->references('id')->on('courses')->onDelete('cascade');
                }
                if (!Schema::hasColumn('coursesdatas', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '12557_5b8983012e391')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('coursesdatas', function(Blueprint $table) {
            
        });
    }
}
