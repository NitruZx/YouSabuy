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
        Schema::create('utility__usages', function (Blueprint $table) {
            $table->id();
            $table->string('Room_ID', 10);
            $table->bigInteger('User_ID');
            $table->integer('Current_Water_Unit');
            $table->integer('Current_Electric_Unit');
            $table->integer('Monthy_Water_Unit');
            $table->integer('Monthy_Electric_Unit');
            $table->timestamp('Created_Date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utility__usages');
    }
};
