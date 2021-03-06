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
            $table->dateTime('posted');
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
        Schema::dropIfExists('reviews');
    }
}
