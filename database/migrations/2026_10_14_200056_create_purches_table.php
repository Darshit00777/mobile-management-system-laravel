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
        Schema::create('purches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
              ->constrained('users')
              ->OnDelete('cascade');
            $table->foreignId('mobile_id')
              ->constrained('mobiles')
              ->OnDelete('cascade');
            $table->integer('qty');
            $table->string('status')->default('cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purches');
    }
};
