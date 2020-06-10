<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoos', function (Blueprint $table) {
			$table->id()->autoIncrement();
            $table->string('name', 45);
            $table->json('address');
			$table->json('contact_details');
			$table->json('maps')->nullable();
			$table->json('opening_times');
			$table->json('images')->nullable();
			$table->string('history')->nullable();
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
        Schema::dropIfExists('zoos');
    }
}
