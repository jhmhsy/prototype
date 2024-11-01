<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('members');
            $table->enum('service_type', ['Monthly', 'Yearly']);
            $table->date('start_date');
            $table->date('due_date');
            $table->decimal('amount', 8, 2);
            $table->integer('month');
            $table->enum('status', ['Active', 'Inactive', 'Expired', 'Due', 'Overdue']);
            $table->string('service_id')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};