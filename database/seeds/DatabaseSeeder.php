<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Kinds_Seeder::class);
         $this->call(AnimalsSeeder::class);
    }
}
