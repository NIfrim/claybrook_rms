<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_bands', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->char('band', 1);
            $table->unsignedSmallInteger('price');
			$table->unsignedTinyInteger('duration')->default(12);
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
        Schema::dropIfExists('sponsorship_bands');
    }
}
