<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_documents', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->unsignedBigInteger('sponsor_agreement_id');
            $table->string('file_name', 45);
			$table->json('meta');
			
			// Constraints
			$table->foreign('sponsor_agreement_id')->references('id')->on('sponsor_agreements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreement_documents');
    }
}
