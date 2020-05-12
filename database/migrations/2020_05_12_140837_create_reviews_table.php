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
        Schema::create('reviews', function (Blueprint $table) {
			$table->id()->autoIncrement();
            $table->unsignedBigInteger('zoo_id');
			$table->unsignedBigInteger('sponsor_id')->nullable();
			$table->unsignedBigInteger('user_id')->nullable();
			$table->enum('posted_by', ['USER', 'SPONSOR']);
            $table->text('title');
			$table->text('review');
			$table->unsignedTinyInteger('reaction');
            $table->timestamp('posted');
            
            // Constraints
            $table->foreign('zoo_id')->references('id')->on('zoos')->onDelete('cascade');
			$table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
