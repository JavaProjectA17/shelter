<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'role' => 'user'
        ]);

        factory(App\User::class, 10)->create([
            'role' => 'user',
        ]);

    }
}
