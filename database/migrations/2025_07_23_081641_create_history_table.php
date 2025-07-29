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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->integer('record_id')->nullable();
            $table->enum('action', ['created', 'updated', 'deleted','searched', 'viewed']);
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable(); 
            $table->timestamps();
            
            $table->index(['table_name', 'record_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
