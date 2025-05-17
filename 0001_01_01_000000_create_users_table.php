<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // مفتاح أساسي مخصص
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedBigInteger('role_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            // العلاقة مع جدول roles
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
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
