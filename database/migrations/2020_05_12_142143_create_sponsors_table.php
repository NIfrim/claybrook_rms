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
			$table->string('job', 45);
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string('primary_contact_number', 15);
			$table->string('secondary_contact_number', 15)->nullable();
			$table->json('address');
			$table->timestamps();
			
			// Constraints
			$table->foreign('zoo_id')->references('id')->on('zoos')->onDelete('cascade');
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
