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
        Schema::table('events', function (Blueprint $table) {
			// Constraints
			$table->foreign('zoo_id', 'fk_events_zoos')->references('id')->on('zoos')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('category_id', 'fk_events_eventsCategories')->references('id')->on('events_categories')->onDelete('cascade')->onUpdate('restrict');
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
