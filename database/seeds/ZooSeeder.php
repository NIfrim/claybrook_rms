<?php
	
	use App\Zoo;
	use Illuminate\Database\Seeder;

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
