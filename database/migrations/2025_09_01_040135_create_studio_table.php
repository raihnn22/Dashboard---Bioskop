<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id');
            $table->string('name'); // nama studio (contoh: IMAX, Regular, Dolby)
            $table->timestamps();

            $table->foreign('cinema_id')
                  ->references('id')
                  ->on('cinemas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
