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
    //     Schema::table('calendars', function (Blueprint $table) {
    //         //
    //         $table->json('data')->after('id')->nullable(true);
    //         $table->dropForeign(['board_id']);
    //         $table->dropForeign(['regist_user_id']);
    //         $table->dropColumn('start_date');
    //         $table->dropColumn('end_date');
    //         $table->dropColumn('type');
    //         $table->dropColumn('title');
    //     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('calendars', function (Blueprint $table) {
            
        // });
    }
};
