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
        Schema::table('calendar', function (Blueprint $table) {
            //
            $table->id();
            $table->string('title')->nullable(false);
            $table->foreignId('board_id')->nullable(false)
                                        ->constrained(
                                            table:'board', indexName:'id'
                                        );
            $table->foreignId('regist_user_id')->nullable(false)
                                        ->constrained(
                                            table:'users', indexName:'id'
                                        );
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendar', function (Blueprint $table) {
            //
        });
    }
};
