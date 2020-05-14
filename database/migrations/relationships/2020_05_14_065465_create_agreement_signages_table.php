<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementSignagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreement_signages', function (Blueprint $table) {
			// Constraints
			$table->foreign('animal_id', 'fk_agreementSignages_animals')->references('id')->on('animals')->onDelete('cascade');
			$table->foreign('agreement_id', 'fk_agreementSignages_sponsorAgreements')->references('id')->on('sponsor_agreements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreement_signages');
    }
}
