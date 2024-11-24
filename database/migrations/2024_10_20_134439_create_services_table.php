<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('members')->onDelete('cascade');
            $table->string('service_type'); // Changed from enum to string
            // $table->enum('service_type', ['1month', '1monthstudent', '3month', '6month', '12month']);
            $table->date('start_date');
            $table->date('due_date');
            $table->decimal('amount', 8, 2);
            $table->integer('month');
            $table->enum('status', ['Active', 'Pre-paid', 'Expired', 'Due', 'Overdue', 'Ended', 'Impending']);
            $table->enum('action_status', ['None', 'Pending', 'Suspended'])->default('None');
            $table->tinyInteger('mail_flag')->default(0);
            $table->string('service_id')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};