<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qr_records', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique(); // ID number from the Member table
            $table->timestamp('created_at')->useCurrent(); // Automatically managed created_at timestamp
            $table->timestamp('updated_at')->useCurrent()->nullable(); // Automatically managed updated_at timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_records');
    }
};