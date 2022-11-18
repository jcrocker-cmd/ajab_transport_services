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
        Schema::create('admininfo', function (Blueprint $table) {
            $table->id();
            $table->string('admin_fname')->nullable();
            $table->string('admin_mname')->nullable();
            $table->string('admin_lname')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('admin_no')->nullable();
            $table->string('admin_bday')->nullable();
            $table->string('admin_purok')->nullable();
            $table->string('admin_baranggay')->nullable();
            $table->string('admin_town')->nullable();
            $table->string('admin_province')->nullable();
            $table->string('admin_postal')->nullable();
            $table->string('admin_fb')->nullable();
            $table->string('admin_about')->nullable();
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
        Schema::dropIfExists('admininfo');
    }
};
