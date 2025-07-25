<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('url', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable(false);
            $table->string('topmenu_code')->nullable(false);
            $table->foreign('topmenu_code')->references('code')->on('topmenu')->cascadeOnDelete();;
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('url')->insert([
            ['topmenu_code'=>'home', 'url'=>'home'],
            ['topmenu_code'=>'board_post', 'url'=>'board/post'],
            ['topmenu_code'=>'settings', 'url'=>'settings'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url');
    }
};
