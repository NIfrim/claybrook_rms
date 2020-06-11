<?php

use App\Models\SponsorAgreement;
use Illuminate\Database\Seeder;

class SponsorAgreementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SponsorAgreement::class, 10)->create();
    }
}
