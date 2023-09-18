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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('Fname', 100);
            $table->string('Lname', 100);
            $table->string('Email', 100);
            $table->dateTime('Checkin_Date');
            $table->dateTime('Checkout_Date');
            $table->bigInteger('User_ID');
            $table->timestamp('created_at');
            $table->string('Room');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
