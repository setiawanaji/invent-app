<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::where('email', 'admin@mail.com')->delete();
        \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123'),
            'role' => 0,
        ]);
    }
}
