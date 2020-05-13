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
		$this->call(EmployeeAccountSeeder::class);
		$this->call(SponsorSeeder::class);
		$this->call(UserSeeder::class);
    }
}
