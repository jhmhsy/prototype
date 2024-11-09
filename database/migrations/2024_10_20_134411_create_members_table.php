<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('id_number');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('fb')->nullable();
            $table->string('email')->nullable();
            $table->enum('membership_type', ['Regular', 'Student']);
            $table->timestamps();
            $table->string('user_identifier', 28)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};