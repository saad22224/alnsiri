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
        Schema::create('lawyer_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('rate_count');
            $table->uuid('lawyer_uuid')->references('uuid')->on('lawyer')->onDelete('cascade');
            $table->uuid('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_rate');
    }
};
