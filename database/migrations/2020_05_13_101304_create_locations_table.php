<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->string('id', 45)->primary()->unique();
            $table->unsignedBigInteger('zoo_id');
			$table->string('name', 45);
			$table->enum('type', ['COMPOUND', 'AVIARY', 'AQUARIUM', 'HOTHOUSE']);
			$table->tinyInteger('vacant');
			$table->unsignedSmallInteger('surface_area');
			$table->text('description');
			
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
        Schema::dropIfExists('locations');
    }
}
