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
        Schema::create('topmenus', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->text('description');
            $table->boolean('is_activate')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('topmenus')->insert([
            ['code'=>'home','name'=>'home','description'=>'메인화면. 게시글 조회','is_activate'=>true],
            ['code'=>'board_post', 'name'=>'Post','description'=>'게시글 작성','is_activate'=>true],
            ['code'=>'settings', 'name'=>'settings','description'=>'관리 페이지','is_activate'=>true],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topmenus');
    }
};
