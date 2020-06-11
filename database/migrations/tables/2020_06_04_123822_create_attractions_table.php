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
            $table->id();
            $table->string('name', 45);
            $table->string('type', 45);
			$table->enum('for', ['ANYONE','ADULTS','CHILDREN']);
			$table->enum('ride_intensity',  ['NIGHTMARE','HIGH','MEDIUM','LOW']);
			$table->unsignedTinyInteger('minimum_height');
			$table->string('type', 45);
            $table->string('short_description', 255);
            $table->string('long_description');
			$table->json('images');
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
