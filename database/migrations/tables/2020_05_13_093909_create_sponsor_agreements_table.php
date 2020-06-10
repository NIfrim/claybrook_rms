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
			$table->dateTime('agreement_start');
			$table->dateTime('agreement_end');
			$table->tinyInteger('signage_area');
			$table->enum('payment_status', ['PENDING', 'PAID', 'OVERDUE', 'DECLINED']);
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
