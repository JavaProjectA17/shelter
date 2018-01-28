<?php

use Illuminate\Database\Seeder;
use App\Kind;

class Kind_of_animals_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::create([
            'kind_of_the_animal'=>'Bugs'
        ]);
    }
}
