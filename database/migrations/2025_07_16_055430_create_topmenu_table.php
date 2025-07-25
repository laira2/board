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
        Schema::create('topmenu', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('topmenu')->insert([
            ['code'=>'home', 'name'=>'home','description'=>'메인화면. 게시글 조회'],
            ['code'=>'board_post', 'name'=>'Post','description'=>'게시글 작성'],
            ['code'=>'settings', 'name'=>'settings','description'=>'관리 페이지'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topmenu');
    }
};
