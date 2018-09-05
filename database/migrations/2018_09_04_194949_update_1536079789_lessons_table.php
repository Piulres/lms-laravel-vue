<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1536079789LessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            
if (!Schema::hasColumn('lessons', 'introduction')) {
                $table->text('introduction')->nullable();
                }
if (!Schema::hasColumn('lessons', 'content')) {
                $table->text('content')->nullable();
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
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('introduction');
            $table->dropColumn('content');
            
        });

    }
}
