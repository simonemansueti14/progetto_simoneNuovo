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
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-12',
            'orario' => '17:00:00',
            'posti'  => 5,
            'nome'   => 'Giovanni',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-13',
            'orario' => '16:00:00',
            'posti'  => 6,
            'nome'   => 'Luca',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-14',
            'orario' => '18:00:00',
            'posti'  => 4,
            'nome'   => 'Emanuele',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-15',
            'orario' => '20:00:00',
            'posti'  => 9,
            'nome'   => 'Davide',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-16',
            'orario' => '16:00:00',
            'posti'  => 8,
            'nome'   => 'Edoardo',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-17',
            'orario' => '19:00:00',
            'posti'  => 4,
            'nome'   => 'Alessandro',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-18',
            'orario' => '16:00:00',
            'posti'  => 4,
            'nome'   => 'Sara',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-19',
            'orario' => '16:00:00',
            'posti'  => 4,
            'nome'   => 'Beatrice',
            'note'   => 'Compleanno',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-20',
            'orario' => '16:00:00',
            'posti'  => 9,
            'nome'   => 'Filippo',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-21',
            'orario' => '21:00:00',
            'posti'  => 4,
            'nome'   => 'Francesco',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-22',
            'orario' => '16:00:00',
            'posti'  => 4,
            'nome'   => 'Leonardo',
            'note'   => 'Compleanno',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-23',
            'orario' => '16:00:00',
            'posti'  => 4,
            'nome'   => 'Gabriele',
            'note'   => 'Degustazione',
        ]);

        Prenotazione::create([
            'giorno' => '2025-10-24',
            'orario' => '21:00:00',
            'posti'  => 4,
            'nome'   => 'Giovanni',
            'note'   => 'Degustazione',
        ]);
    }
}
