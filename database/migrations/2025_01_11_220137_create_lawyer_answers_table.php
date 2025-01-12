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
        Schema::create('lawyer_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('question');
            $table->text('answer');
            $table->foreignId('lawyer_id')->constrained('lawyer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_answers');
    }
};
