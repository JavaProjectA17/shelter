<?php

use Illuminate\Database\Seeder;
use App\AnimalCategory;

class AnimalCategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AnimalCategory::class, 5)->create();
    }
}
