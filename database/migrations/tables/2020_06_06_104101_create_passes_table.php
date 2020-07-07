<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('passes', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('zoo_id');
			$table->enum('type', ['ADULT', 'FAMILY']);
			$table->decimal('price_gate', 4, 2);
			$table->decimal('price_online', 4, 2);
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
        Schema::dropIfExists('passes');
    }
}
