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
        Schema::create('lawyer_office', function (Blueprint $table) {
            $table->id();
            $table->string('google_map_url')->nullable();
            $table->uuid('lawyer_uuid');
            $table->unsignedBigInteger('speciality_id')->nullable();
            $table->foreign('speciality_id')->references('id')->on('speciality')->onDelete('cascade');
            $table->string('law_office')->nullable();
            $table->string('call_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->longText('specialties')->nullable();
            $table->boolean('speaking_english')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_office');
    }
};
