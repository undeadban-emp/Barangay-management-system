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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->char('phonenumber')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('account_level')->nullable();
            $table->foreignId('region_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('municipality_id')->nullable();
            $table->foreignId('barangay_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};