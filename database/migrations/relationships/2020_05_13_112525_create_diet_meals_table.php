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
        Schema::table('diet_meals', function (Blueprint $table) {
			// Constraints
			$table->foreign('diet_id', 'fk_dietMeals_animalDiets')->references('id')->on('animal_diets')->onDelete('cascade');
			$table->foreign('animal_feed_id', 'fk_dietMeals_animalFeeds')->references('id')->on('animal_feeds')->onDelete('set null');
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
