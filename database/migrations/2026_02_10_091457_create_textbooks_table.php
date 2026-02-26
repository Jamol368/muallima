<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('textbooks', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->text('description')->nullable();
            $table->integer('downloaded')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('textbooks');
    }
};
