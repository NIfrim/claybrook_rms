<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMammalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mammals', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('animal_id', 45);
			$table->string('gestational_period', 45);
			$table->string('category', 45);
			$table->unsignedTinyInteger('offspring_number');
	
			// Constraints
			$table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mammals');
    }
}
