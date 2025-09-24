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
        Schema::table('tests', static function (Blueprint $table) {
            $table->unsignedTinyInteger('degree')->nullable();
            $table->unsignedTinyInteger('part')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', static function (Blueprint $table) {
            $table->dropColumn('degree');
            $table->dropColumn('part');
        });
    }
};
