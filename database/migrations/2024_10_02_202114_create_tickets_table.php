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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // required|string
            $table->string('email'); // required|email
            $table->string('phone'); // required|string
            $table->string('currency'); // required|string
            $table->decimal('amount', 10, 2); // required|numeric (assuming 2 decimal places)
            $table->string('description'); // required|string
            $table->string('item_name'); // required|string
            $table->integer('quantity'); // required|integer
            $table->string('status'); 
            $table->string('payment');
            $table->binary('encrypted_key');
            $table->binary('encrypted_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};