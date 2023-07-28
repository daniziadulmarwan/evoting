<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('fullname');
            $table->string('password');
            $table->string('password_text');
            $table->string('photo')->nullable();
            $table->enum('status', ['voted', 'notvoted'])->default('notvoted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
