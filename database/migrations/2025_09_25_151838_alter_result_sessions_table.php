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
            $table->string('status')->default('in_progress')->nullable()->after('score');
            $table->timestamp('finished_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', static function (Blueprint $table) {
            $table->dropColumn('finished_at');
            $table->dropColumn('status');
        });
    }
};
