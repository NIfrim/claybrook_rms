<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementSignageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_signages', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->unsignedBigInteger('animal_id');
			$table->unsignedBigInteger('agreement_id');
            $table->enum('status', ['APPROVED', 'DENIED', 'PENDING']);
			$table->text('reason');
			$table->string('image_file_name', 45);
			
			// Constraints
			$table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
			$table->foreign('agreement_id')->references('id')->on('sponsor_agreements')->onDelete('cascade');
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
