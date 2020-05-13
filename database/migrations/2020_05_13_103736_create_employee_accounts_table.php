<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_accounts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('employee_id');
			$table->string('account_type', 45);
			$table->string('username', 45)->unique();
			$table->string('password', 255);
			$table->json('permissions');
			$table->timestamps();
			
			// Constraints
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_accounts');
    }
}
