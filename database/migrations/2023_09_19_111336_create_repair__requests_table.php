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
            $table->bigIncrements('request_id');
            $table->bigInteger('client_id');
            $table->longText('description');
            $table->string('technician_id');
            $table->enum('status', ['finished', 'unfinished'])->default('finished');
            $table->timestamp('created_at');
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
