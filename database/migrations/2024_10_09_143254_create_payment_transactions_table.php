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
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('currency');
            $table->integer('amount');
            $table->string('description');
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('status'); 
            $table->timestamp('updated_at')->nullable(); //
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