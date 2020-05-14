<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReptilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reptiles', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('animal_id', 45);
			$table->enum('reproduction_type', ['LIVE_BEARER', 'EGG_LAYER']);
			$table->unsignedTinyInteger('clutch_size');
			$table->unsignedSmallInteger('offspring_number');
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
        Schema::dropIfExists('reptiles');
    }
}
