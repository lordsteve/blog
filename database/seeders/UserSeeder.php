<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Steve Beaudry',
            'username' => 'lordsteve',
            'email' => 'live.remix@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$AtmP.eXcWgsSJRyc8G39lO2yvvbIkyGnPeLutQVbf9XkWX5UdDh8m',
            'remember_token' => Str::random(10),
        ]);
    }
}
