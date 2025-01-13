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
            $table->uuid('question_uuid')->constrained('question');
            $table->text('answer');
            $table->uuid('lawyer_uuid')->constrained('lawyer')->onDelete('cascade');
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
