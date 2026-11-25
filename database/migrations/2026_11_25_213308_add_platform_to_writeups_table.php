<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('writeups', function (Blueprint $table) {
            $table->string('platform')->default('Other')->after('difficulty');
        });
    }

    public function down(): void
    {
        Schema::table('writeups', function (Blueprint $table) {
            $table->dropColumn('platform');
        });
    }
};
