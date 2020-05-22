<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('birds', function (Blueprint $table) {
			// Constraints
			$table->foreign('location_id', 'fk_birds_locations')->references('id')->on('locations')->onDelete('cascade');
			$table->foreign('sponsorship_band_id', 'fk_birds_sponsorshipBands')->references('id')->on('sponsorship_bands')->onDelete('set null');
			$table->foreign('habitat_id', 'fk_birds_animalHabitats')->references('id')->on('animal_habitats')->onDelete('set null');
			$table->foreign('educational_info_id', 'fk_birds_educationalInfos')->references('id')->on('educational_infos')->onDelete('set null');
			$table->foreign('agreement_signage_id', 'fk_birds_agreementSignages')->references('id')->on('agreement_signages')->onDelete('set null');
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
