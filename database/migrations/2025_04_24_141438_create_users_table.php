<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID primario
            $table->string('name'); // Nome utente
            $table->string('email')->unique(); // Email unica
            $table->string('password'); // Password
            $table->timestamps(); // Campi created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};