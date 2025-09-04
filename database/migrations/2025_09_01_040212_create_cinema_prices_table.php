<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cinema_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studio_id')->constrained()->onDelete('cascade');
            $table->integer('weekday_price');
            $table->integer('friday_price');
            $table->integer('weekend_price');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cinema_prices');
    }
};
