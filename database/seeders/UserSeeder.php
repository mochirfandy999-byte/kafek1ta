<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Kasir CafeKita',
            'username' => 'kasir',
            'password' => Hash::make('123456'),
            'role' => 'kasir',
        ]);

        User::create([
            'nama' => 'Staff Dapur CafeKita',
            'username' => 'dapur',
            'password' => Hash::make('123456'),
            'role' => 'staff_dapur',
        ]);

        User::create([
            'nama' => 'Manager CafeKita',
            'username' => 'manager',
            'password' => Hash::make('123456'),
            'role' => 'manager',
        ]);
    }
}