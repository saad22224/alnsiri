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
        Schema::create('lawyer_chances', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->string('case_type');
            $table->string('case_details');
            $table->string('city');
            $table->date('date');
            $table->integer('price');
            $table->string('status')->default(1);
            $table->uuid('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->uuid('lawyer_uuid')->references('uuid')->on('lawyer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_chances');
    }
};
