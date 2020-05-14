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
        Schema::create('agreement_signages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
			$table->string('animal_id', 45);
			$table->unsignedBigInteger('agreement_id');
			$table->enum('status', ['APPROVED', 'DENIED', 'PENDING']);
			$table->text('reason');
			$table->string('image_file_name', 45);
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
