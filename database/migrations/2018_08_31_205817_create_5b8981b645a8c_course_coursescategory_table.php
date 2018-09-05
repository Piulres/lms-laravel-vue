<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b8981b645a8cCourseCoursescategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('course_coursescategory')) {
            Schema::create('course_coursescategory', function (Blueprint $table) {
                $table->integer('course_id')->unsigned()->nullable();
                $table->foreign('course_id', 'fk_p_12552_12550_coursesc_5b8981b645b3d')->references('id')->on('courses')->onDelete('cascade');
                $table->integer('coursescategory_id')->unsigned()->nullable();
                $table->foreign('coursescategory_id', 'fk_p_12550_12552_course_c_5b8981b645b85')->references('id')->on('coursescategories')->onDelete('cascade');
                
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
        Schema::dropIfExists('course_coursescategory');
    }
}
