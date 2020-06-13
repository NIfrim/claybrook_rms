<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Constraints
            $table->foreign('zoo_id', 'fk_reviews_zoos')->references('id')->on('zoos')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('sponsor_id', 'fk_reviews_sponsors')->references('id')->on('sponsors')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('user_id', 'fk_reviews_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
