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
        Schema::table('news', function (Blueprint $table) {
			// Constraints
			$table->foreign('zoo_id', 'fk_news_zoos')->references('id')->on('zoos')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('category_id', 'fk_news_newsCategories')->references('id')->on('news_categories')->onDelete('cascade')->onUpdate('restrict');
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
