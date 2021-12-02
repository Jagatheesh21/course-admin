<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {

            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('course_id');
            $table->foreignId('slot_id');
            $table->text('payment_status');
            $table->double('amount_payable',16,2);
            $table->double('amount_paid',16,2);
            $table->text('transaction_id');
            $table->integer('status');
            $table->text('remarks');
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
        Schema::dropIfExists('enrollments');
    }
}
