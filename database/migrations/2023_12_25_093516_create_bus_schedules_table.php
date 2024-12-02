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
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bus_departure_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('day')->min(0)->max(6);
            $table->time('time');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_schedules');
    }
};
