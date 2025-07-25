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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable(false);
            $table->text('comment');
            $table->bigInteger('parent_id')->nullable(true);
            $table->integer('depth')->default(0);
            $table->foreignId('post_id')->nullable(false)
                                        ->constrained(
                                            table:'board', indexName:'id'
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
        Schema::dropIfExists('comment');
    }
};
