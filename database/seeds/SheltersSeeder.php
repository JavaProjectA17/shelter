<?php

use Illuminate\Database\Seeder;
use App\Shelter;

class SheltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Shelter::class, 10)->create();
    }
}
