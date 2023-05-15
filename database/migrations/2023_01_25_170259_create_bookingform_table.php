<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingform', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('con_num')->nullable();
            $table->string('address')->nullable();
            $table->string('con_email')->nullable();
            $table->string('mode_del')->nullable();
            $table->string('front_license')->nullable();
            $table->string('back_license')->nullable();
            $table->string('payment')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_time')->nullable();
            $table->string('form_type')->nullable();
            $table->string('total_amount_payable')->nullable();
            $table->string('msg')->nullable();
            $table->string('car_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->boolean('car_rating')->default(false);
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
        Schema::dropIfExists('bookingform');
    }
};
