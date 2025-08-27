<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prenotazione;

class PrenotazioneSeeder extends Seeder
{
    public function run(): void
    {
        Prenotazione::create([
            'giorno' => '2025-10-10',
            'orario' => '16:00:00',
            'posti'  => 4,
            'nome'   => 'Mario',
            'note'   => 'Compleanno',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-11',
            'orario' => '18:00:00',
            'posti'  => 2,
            'nome'   => 'Luisa',
            'note'   => 'Tavolo vicino alla finestra',
        ]);
    }
}
