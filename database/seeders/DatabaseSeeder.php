<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder per la tabella prenotazioni
        $this->call(PrenotazioneSeeder::class);
        $this->call(BirraSeeder::class);
        $this->call(AdminUserSeeder::class);
    }
}
