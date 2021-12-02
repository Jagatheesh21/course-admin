<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('course_id');
            $table->text("name")->nullable();
            $table->text("slug")->nullable();
            $table->text("descrpition")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->time("start_time")->nullable();
            $table->time("end_time")->nullable();
            $table->string("seats")->nullable();
            $table->string("price")->nullable();
            $table->integer("status")->nullable();
            $table->text("video_url")->nullable();
            $table->text("zoom_url")->nullable();
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
        Schema::dropIfExists('slots');
    }
}
