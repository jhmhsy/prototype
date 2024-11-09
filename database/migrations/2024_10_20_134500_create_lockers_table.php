<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('members');
            $table->date('start_date');
            $table->date('due_date');
            $table->decimal('amount', 8, 2);
            $table->integer('month');
            $table->integer('locker_no');
            $table->enum('status', ['Active', 'Inactive', 'Expired', 'Due', 'Overdue', 'Ended']);
        });
    }

    public function down()
    {
        Schema::dropIfExists(table: 'lockers');
    }
};