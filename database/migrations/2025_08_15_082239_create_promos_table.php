<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('name');
            $table->date('berakhir')->nullable();
            $table->longText('deskripsi');
            $table->longText('syarat')->nullable(); // Syarat untuk promo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
