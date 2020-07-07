<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_agreements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('sponsor_id');
			$table->date('date');
			$table->date('agreement_start');
			$table->date('agreement_end');
			$table->unsignedDecimal('signage_area', 5, 2)->nullable()->default(12.50);
			$table->enum('payment_status', ['PENDING', 'PAID', 'OVERDUE', 'DECLINED'])->nullable()->default('PENDING');
			$table->json('documents')->nullable();
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
        Schema::dropIfExists('sponsor_agreements');
    }
}
