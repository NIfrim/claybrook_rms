<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	 	$this->call(ZooSeeder::class);
	 	$this->call(AccountTypeSeeder::class);
		$this->call(EmployeeSeeder::class);
//		$this->call(SponsorSeeder::class);
//		$this->call(SponsorAgreementSeeder::class);
//		$this->call(UserSeeder::class);
//		$this->call(SponsorReviewSeeder::class);
//		$this->call(UserReviewSeeder::class);
    }
}
