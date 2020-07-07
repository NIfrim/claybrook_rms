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
			$table->string('animal_id', 45);
			$table->unsignedBigInteger('agreement_id');
			$table->enum('status', ['APPROVED', 'DENIED', 'PENDING'])->nullable()->default('PENDING');
			$table->text('reason')->nullable();
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
        Schema::dropIfExists('agreement_signages');
    }
}
