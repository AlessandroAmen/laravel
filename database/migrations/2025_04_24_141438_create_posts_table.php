<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // ID primario
            $table->string('title'); // Titolo del post
            $table->text('content'); // Contenuto del post
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relazione con la tabella users
            $table->timestamps(); // Campi created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};