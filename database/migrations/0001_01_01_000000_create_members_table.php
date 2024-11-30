<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->nullable()->default('******');
            $table->string('name');
            $table->string('phone')->unique()->nullable();
            $table->string('fb')->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('membership_type', ['Regular', 'Student', 'Walkin', 'Manual']);
            $table->decimal('amount', 8, 2);
            $table->timestamps();

            $table->index('id_number');

        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};