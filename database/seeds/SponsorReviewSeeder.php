<?php

use App\Models\Review;
use Illuminate\Database\Seeder;

class SponsorReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Review::class, 20)->create();
    }
}
