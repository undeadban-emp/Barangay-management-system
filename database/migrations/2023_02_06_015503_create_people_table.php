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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middelename');
            $table->string('lastname');
            $table->string('suffix');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->char('sex');
            $table->string('civil_status');
            $table->string('citizenship');
            $table->integer('house_no');
            $table->foreignId('region')->nullable();
            $table->foreignId('province')->nullable();
            $table->foreignId('municipality')->nullable();
            $table->foreignId('barangay')->nullable();
            $table->foreignId('purok')->nullable();
            $table->foreignId('zone')->nullable();
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
        Schema::dropIfExists('people');
    }
};