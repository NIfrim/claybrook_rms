<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('zoo_id');
            $table->string('name', 45);
            $table->string('type', 45);
			$table->enum('for', ['ANYONE','ADULTS','CHILDREN']);
			$table->enum('ride_intensity',  ['NIGHTMARE','HIGH','MEDIUM','LOW']);
			$table->unsignedTinyInteger('minimum_height');
			$table->json('images')->nullable();
			$table->string('short_description', 255);
            $table->text('long_description')->nullable();
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
        Schema::dropIfExists('attractions');
    }
}
