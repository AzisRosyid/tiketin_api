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
        Schema::create('bus_departures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('checkpoint_start')->constrained('checkpoints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('checkpoint_end')->constrained('checkpoints')->onUpdate('cascade')->onDelete('cascade');
            $table->float('multiplier');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_departures');
    }
};
