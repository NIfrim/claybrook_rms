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
        Schema::table('mammals', function (Blueprint $table) {
			// Constraints
			$table->foreign('location_id', 'fk_mammals_locations')->references('id')->on('locations')->onDelete('cascade');
			$table->foreign('sponsorship_band_id', 'fk_mammals_sponsorshipBands')->references('id')->on('sponsorship_bands')->onDelete('set null');
			$table->foreign('habitat_id', 'fk_mammals_animalHabitats')->references('id')->on('animal_habitats')->onDelete('set null');
			$table->foreign('educational_info_id', 'fk_mammals_educationalInfos')->references('id')->on('educational_infos')->onDelete('set null');
			$table->foreign('agreement_signage_id', 'fk_mammals_agreementSignages')->references('id')->on('agreement_signages')->onDelete('set null');
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
