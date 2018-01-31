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
         $this->call(AnimalCategorysSeeder::class);
         $this->call(AnimalsSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(NoveltysSeeder::class);
         $this->call(SheltersSeeder::class);
    }
}
