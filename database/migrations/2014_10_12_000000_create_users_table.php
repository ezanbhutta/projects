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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('temp_password')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('is_email_verified')->comment('0= Unverified, 1= Verified')->nullable();
            $table->string("role")->nullable();
            $table->string("labour_cost")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
