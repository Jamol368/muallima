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
            $table->unsignedBigInteger('topic_id')->nullable()->after('subject_id');
            $table->smallInteger('degree')->nullable()->after('topic_id');
            $table->smallInteger('part')->nullable()->after('degree');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', static function (Blueprint $table) {
            $table->dropColumn('part');
            $table->dropColumn('degree');
            $table->dropColumn('topic_id');
        });
    }
};
