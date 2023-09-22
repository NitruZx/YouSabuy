<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('tel', 10);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role', ['guest', 'tenant'])->default('guest');
            $table->string('room_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
