<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sec_name')->nullable();
            $table->string('sec_desc')->nullable();
            $table->string('sec_video')->nullable();
            $table->string('url')->nullable();
            $table->integer('module_id')->unsigned();
            $table->timestamps();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_sections');
    }
}
