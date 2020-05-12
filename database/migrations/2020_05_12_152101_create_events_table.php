<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('zoo_id');
            $table->unsignedBigInteger('category_id');
			$table->string('title', 255);
			$table->timestamp('start_date');
			$table->timestamp('end_date');
			$table->enum('repeat', ['DAILY', 'WEEKLY', 'MONTHLY', 'YEARLY', 'NEVER']);
			$table->text('short_description');
			$table->text('long_description');
			$table->json('images');
			
			// Constraints
			$table->foreign('zoo_id')->references('id')->on('zoos')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('event_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
