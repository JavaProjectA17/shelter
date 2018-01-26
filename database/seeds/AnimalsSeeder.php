<?php

use Illuminate\Database\Seeder;
use App\Animal;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animal::create([
            'pet_name'=>'Tuzik',
            'pet_image'=>'img1.png',
            'about'=>'very friendly dog'
        ]);
    }
}
