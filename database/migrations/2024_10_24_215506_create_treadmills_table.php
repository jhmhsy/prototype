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
        Schema::create('treadmills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('members');
            $table->date('start_date');
            $table->date('due_date');
            $table->integer('month');
            $table->decimal('amount', 8, 2);
            $table->enum('status', ['Active', 'Inactive', 'Expired', 'Due', 'Overdue']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treadmills');
    }
};