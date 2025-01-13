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
        Schema::create('lawyer', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('password');
            $table->string('repeat_password');
            $table->string('otp');
            $table->tinyInteger('status')->default(1);
            $table->string('phone_number')->unique();
            $table->integer('experience');
            $table->rememberToken();
            $table->timestamp('last_activity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer');
    }
};
