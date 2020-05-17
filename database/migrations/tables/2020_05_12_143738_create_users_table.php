<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('zoo_id');
			$table->string('title', 5);
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('email', 45)->unique();
			$table->string('password', 255);
			$table->boolean('active')->default(false);
			$table->rememberToken();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
