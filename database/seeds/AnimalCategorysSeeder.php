<?php

use Illuminate\Database\Seeder;
use App\Kind;

class AnimalCategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::create([
            'title'=>'Bugs'
        ]);
    }
}
