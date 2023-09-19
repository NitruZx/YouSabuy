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
        Schema::create('repair__requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name');
            $table->string('room');
            $table->string('tel', 10);
            $table->longText('description');
            $table->string('receiver');
            $table->string('status');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair__requests');
    }
};
