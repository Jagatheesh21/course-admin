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
            $table->integer("course_id")->nullable();
            $table->text("name")->nullable();
            $table->date("batch_start_date")->nullable();
            $table->date("batch_end_date")->nullable();
            $table->time("b_start_time")->nullable();
            $table->time("b_end_time")->nullable();
            $table->string("seats")->nullable();
            $table->string("price")->nullable();
            $table->timestamps();
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
