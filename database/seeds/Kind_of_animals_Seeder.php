<?php

use Illuminate\Database\Seeder;
use App\Kind_of_animal;

class Kind_of_animals_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind_of_animal::create([
            'kind_of_the_animal'=>'Bugs'
        ]);
    }
}
