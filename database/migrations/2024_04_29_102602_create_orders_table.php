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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('product_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('transaction_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->integer('qty');
            $table->double('price');
            $table->double('total');
            $table->integer('rating')->nullable();
            $table->text('review')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
