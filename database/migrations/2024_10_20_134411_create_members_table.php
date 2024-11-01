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
            $table->string('phone');
            $table->string('fb')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->string('user_identifier', 28)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};