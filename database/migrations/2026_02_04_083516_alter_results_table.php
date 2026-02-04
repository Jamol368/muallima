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
        Schema::table('results', static function (Blueprint $table) {
            $table->boolean('mixed')->default(false)->after('part');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', static function (Blueprint $table) {
            $table->dropColumn('mixed');
        });
    }
};
