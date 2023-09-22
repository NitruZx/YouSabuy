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
        Schema::create('maid_calls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('room_id', 5);
            $table->string('status');
            $table->string('maid_id');
            $table->dateTime('clean_date', $precision = 0);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maid_calls');
    }
};
