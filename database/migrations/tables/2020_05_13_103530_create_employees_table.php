<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('zoo_id');
			$table->unsignedBigInteger('account_type_id')->nullable();
			$table->string('title', 5);
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('job_title', 45);
			$table->string('email', 255)->unique();
			$table->string('password');
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
        Schema::dropIfExists('employees');
    }
}
