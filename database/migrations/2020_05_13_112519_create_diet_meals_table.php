<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_meals', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('diet_id');
			$table->unsignedBigInteger('animal_feed_id')->nullable();
			$table->timestamp('time_of_day');
			$table->text('notes');
			$table->unsignedSmallInteger('quantity');
			$table->json('days');
			$table->timestamps();
			
			// Constraints
			$table->foreign('diet_id')->references('id')->on('animal_diets')->onDelete('cascade');
			$table->foreign('animal_feed_id')->references('id')->on('animal_feeds')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_meals');
    }
}
