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
        AnimalCategory::create([
            'title'=>'Bugs'
        ]);
    }
}
