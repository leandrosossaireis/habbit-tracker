<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->dropUnique(['name']); // ajuste o nome do índice se necessário
            $table->unique(['user_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'name']);
            $table->unique(['name']);
        });
    }
};