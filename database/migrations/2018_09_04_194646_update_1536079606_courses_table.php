<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1536079606CoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            
if (!Schema::hasColumn('courses', 'featured_image')) {
                $table->string('featured_image')->nullable();
                }
if (!Schema::hasColumn('courses', 'description')) {
                $table->string('description')->nullable();
                }
if (!Schema::hasColumn('courses', 'introduction')) {
                $table->text('introduction')->nullable();
                }
if (!Schema::hasColumn('courses', 'duration')) {
                $table->integer('duration')->nullable();
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
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('featured_image');
            $table->dropColumn('description');
            $table->dropColumn('introduction');
            $table->dropColumn('duration');
            
        });

    }
}
