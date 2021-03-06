<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('zoo_id');
			$table->unsignedBigInteger('category_id');
			$table->text('title');
			$table->date('date_posted');
			$table->date('date_expire');
			$table->enum('repeat', ['MONTHLY', 'YEARLY', 'NEVER']);
			$table->text('short_description');
			$table->text('long_description');
			$table->text('image')->nullable();
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
        Schema::dropIfExists('news');
    }
}
