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
			$table->string('location_name', 45);
			$table->enum('location_type', ['COMPOUND', 'AVIARY', 'AQUARIUM', 'HOTHOUSE']);
			$table->char('vacant', 1);
			$table->unsignedSmallInteger('surface_area')->nullable();
			$table->text('location_description');
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
        Schema::dropIfExists('locations');
    }
}
