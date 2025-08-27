<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cambia email/password come vuoi
        User::firstOrCreate(
            ['email' => 'simonemansueti@gmail.com'],
            [
                'name'     => 'Simone',
                'password' => Hash::make('Canefrisbi1!'), 
                'role'     => 'admin',
            ]
        );
    }
}
