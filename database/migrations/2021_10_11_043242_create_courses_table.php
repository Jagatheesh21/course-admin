<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('name')->nullable();
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('course_picture')->nullable();
            $table->text('tags')->nullable();
            $table->integer('skill_level_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
