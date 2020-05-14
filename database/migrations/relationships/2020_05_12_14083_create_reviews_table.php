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
            $table->foreign('zoo_id', 'fk_reviews_zoos')->references('id')->on('zoos')->onDelete('cascade');
			$table->foreign('sponsor_id', 'fk_reviews_sponsors')->references('id')->on('sponsors')->onDelete('cascade');
			$table->foreign('user_id', 'fk_reviews_users')->references('id')->on('users')->onDelete('cascade');
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
