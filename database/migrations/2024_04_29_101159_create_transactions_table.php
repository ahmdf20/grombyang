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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->string('invoice');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->text('address');
            $table->double('shipping_cost');
            $table->double('total');
            $table->float('weight');
            $table->dateTime('order_at');
            $table->dateTime('process_at');
            $table->dateTime('delivered_at');
            $table->enum('status', ['complete', 'cancel', 'process', 'pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
