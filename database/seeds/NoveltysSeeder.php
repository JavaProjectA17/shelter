<?php

use Illuminate\Database\Seeder;
use App\Novelty;

class NoveltysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Novelty::class, 10)->create();
    }
}
