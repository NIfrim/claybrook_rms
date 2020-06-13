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
        Schema::table('animals', function (Blueprint $table) {
			// Constraints
			$table->foreign('location_id', 'fk_animals_locations')->references('id')->on('locations')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('sponsorship_band_id', 'fk_animals_sponsorshipBands')->references('id')->on('sponsorship_bands')->onDelete('set null');
			$table->foreign('habitat_id', 'fk_animals_animalHabitats')->references('id')->on('animal_habitats')->onDelete('set null')->onUpdate('restrict');
			$table->foreign('educational_info_id', 'fk_animals_educationalInfos')->references('id')->on('educational_infos')->onDelete('set null')->onUpdate('restrict');
			$table->foreign('agreement_signage_id', 'fk_animals_agreementSignages')->references('id')->on('agreement_signages')->onDelete('set null')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
