<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_infos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->text('food_and_foraging');
			$table->unsignedDecimal('min_height', 4, 2);
			$table->unsignedDecimal('max_height', 4, 2);
			$table->unsignedDecimal('min_weight', 6, 2);
			$table->unsignedDecimal('max_weight', 6, 2);
			$table->unsignedInteger('population');
			$table->unsignedTinyInteger('average_life_span');
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
        Schema::dropIfExists('educational_infos');
    }
}
