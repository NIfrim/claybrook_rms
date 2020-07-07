<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('zoo_id');
			$table->string('title', 5);
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('job_title', 45)->nullable();
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string('primary_contact_number', 15)->unique()->nullable();
			$table->string('secondary_contact_number', 15)->unique()->nullable();
			$table->string('building', 45)->nullable();
			$table->string('road', 45)->nullable();
			$table->string('city', 45)->nullable();
			$table->string('postcode', 10)->nullable();
			$table->boolean('active')->nullable()->default(false);
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
        Schema::dropIfExists('sponsors');
    }
}
