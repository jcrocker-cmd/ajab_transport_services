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
        Schema::create('addcar', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('plate')->nullable();
            $table->string('seats')->nullable();
            $table->string('fuel')->nullable();
            $table->string('displacement')->nullable();
            $table->string('mileage')->nullable();
            $table->string('carlocation')->nullable();
            $table->string('transmission')->nullable();
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
        Schema::dropIfExists('addcar');
    }
};
