<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
			$table->string('id', 45)->unique()->primary();
			$table->string('location_id', 45);
			$table->char('sponsorship_band_id', 1)->nullable();
			$table->unsignedBigInteger('habitat_id')->nullable();
			$table->unsignedBigInteger('educational_info_id')->nullable();
			$table->unsignedBigInteger('agreement_signage_id')->nullable();
			$table->string('species', 45);
			$table->string('classification', 45)->nullable();
			$table->enum('type', ['MAMMAL', 'REPTILE', 'FISH', 'BIRD']);
			$table->string('name', 45);
			$table->date('date_joined');
			$table->date('dob');
			$table->enum('gender', ['MALE', 'FEMALE']);
			$table->tinyInteger('life_span');
			$table->unsignedDecimal('height_joined', 4);
			$table->unsignedDecimal('weight_joined', 6);
			$table->string('animal_id', 45);
			$table->unsignedDecimal('average_body_temperature', 4);
			$table->string('water_type', 45);
			$table->string('colour', 45);
			$table->text('diet')->nullable();
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
        Schema::dropIfExists('fish');
    }
}
