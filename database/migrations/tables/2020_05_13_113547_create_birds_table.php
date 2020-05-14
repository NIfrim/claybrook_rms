<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birds', function (Blueprint $table) {
            $table->id()->autoIncrement();
        	$table->string('animal_id', 45);
            $table->string('nest_construction', 45);
			$table->unsignedTinyInteger('clutch_size');
			$table->unsignedSmallInteger('wingspan');
			$table->char('can_fly', 1);
			$table->string('plumage', 45);
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
        Schema::dropIfExists('birds');
    }
}
