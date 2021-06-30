<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ad Ministartor',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make("Password1"),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
