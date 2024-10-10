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
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('checkout_session_id')->unique();
            $table->integer('amount');
            $table->timestamp('paid_at');
            $table->string('status');
            $table->string('payment_method');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('description');
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('currency');
            $table->integer('fee');
            $table->integer('net_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};