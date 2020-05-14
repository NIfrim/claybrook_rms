<?php

use Illuminate\Database\Seeder;
use App\Zoo;

class ZooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Zoo::class, 1)->create();
    }
}
