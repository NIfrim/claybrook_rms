<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
			$table->string('id', 45)->unique()->primary();
			$table->string('location_id', 45);
			$table->unsignedBigInteger('sponsorship_band_id')->nullable();
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
			$table->unsignedDecimal('height_joined', 4, 2);
			$table->unsignedDecimal('weight_joined', 6, 2);
            $table->string('nest_construction', 45)->nullable();
			$table->unsignedTinyInteger('clutch_size')->nullable();
			$table->unsignedSmallInteger('wingspan')->nullable();
			$table->char('can_fly', 1)->nullable();
			$table->string('plumage', 45)->nullable();
			$table->unsignedTinyInteger('gestational_period')->nullable();
			$table->unsignedTinyInteger('offspring_number')->nullable();
			$table->unsignedDecimal('average_body_temperature', 4, 2)->nullable();
			$table->string('water_type', 45)->nullable();
			$table->string('colour', 45)->nullable();
			$table->enum('reproduction_type', ['LIVE_BEARER', 'EGG_LAYER'])->nullable();
			$table->text('diet')->nullable();
			$table->char('on_website', 1);
			$table->char('in_spotlight', 1);
			$table->text('did_you_know')->nullable();
			$table->unsignedTinyInteger('life_span');
			$table->json('images')->nullable();
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
        Schema::dropIfExists('birds');
    }
}
