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
        Schema::create('trackers', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('courier_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('transaction_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['complete', 'process', 'pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackers');
    }
};
