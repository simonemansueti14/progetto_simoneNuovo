<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Birra;

class BirraSeeder extends Seeder
{
    public function run(): void
    {
        Birra::create([
            'nome' => 'Egeria',
            'tipo' => 'Golden Ale',
            'gradazione' => 5.5,
            'ibu' => 15.9,
            'ebc' => 7,
            'descrizione' => 'Gusto erbaceo e floreale; perfetta con primi piatti saporiti, selvaggina e carne.
                              Non sottovalutare la bionda! Il luppolo saaz le dona un aroma speziato. È preziosa tanto quanto il suo colore dorato!',
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Mithra',
            'tipo' => 'Blanche',
            'gradazione' => 4.8,
            'ibu' => 21,
            'ebc' => 3,
            'descrizione' => 'Note speziate e agrumate; ottima con pesce, crostacei, aperitivi e la pizza.
                              Bianca come la neve d\'inverno, fresca come la rugiada in primavera, colore chiaro come l\'alba in autunno, è la birra estiva perfetta!',
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Maya',
            'tipo' => 'Marzen al miele di castagno',
            'gradazione' => 6,
            'ibu' => 15,
            'ebc' => 17,
            'descrizione' => "Gusto predominante di miele di castagno. Perfetta con carne di maiale, cibi speziati, formaggi stagionati e dolci invernali.
                              Un po' di miele e passa tutto! Birra marzen dal gusto dolce e dall'inconfondibile aroma di miele di castagno di primissima qualità.",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Avus',
            'tipo' => 'Biere Degarde',
            'gradazione' => 7,
            'ibu' => 18,
            'ebc' => 19,
            'descrizione' => "Sentori di malto tostato e caramello. Ottima abbinata con carni rosse, grigliate, bolliti e formaggi.
                              Una birra ruffiana, da starci attenti! Il suo gusto corposo non stenta a farsi notare. Aroma di caramello e malto tostato; è una birra col cappello.",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Malmostosa',
            'tipo' => 'Italian Grape Ale',
            'gradazione' => 5.5,
            'ibu' => 11.9,
            'ebc' => 16,
            'descrizione' => "Gusto fruttato e dolce di mosto d'uva; perfetta per i vostri aperitivi.
                              Birra o vino cosa scegli? La malmostosa è la scelta nel mezzo. Il mix perfetto dell'amaro della birra e il dolce fruttato del mosto d'uva.",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Alemonia',
            'tipo' => 'Belgian Strong Ale',
            'gradazione' => 7,
            'ibu' => 18,
            'ebc' => 15,
            'descrizione' => "Gusto dolce dello zucchero candito ma al contempo corposo. Ottima con arrosti, pesce alla griglia e formaggi stagionati.
                              Lascia che il gusto fruttato e le linee disegnate dalla schiuma della nostra belgian ti portino tra i merletti di Bruxelles. Enjoy the journey!",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Che Tipa',
            'tipo' => 'Indian Pale Ale',
            'gradazione' => 5,
            'ibu' => 21,
            'ebc' => 3,
            'descrizione' => "Gusto amaro dal forte sentore erbaceo; perfetta carni bianche e pesce.
                              Che Tipa! Interessante e decisa, amara e luppolosa. Un mosaic... di sapori di malto, luppolo e frutti tropicali.",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Apache',
            'tipo' => 'American Pale Ale',
            'gradazione' => 6,
            'ibu' => 38,
            'ebc' => 15,
            'descrizione' => "Gusto amaro e vellutato aroma agrumato. Ottima con primi piatti leggeri, pesce e carni bianche.
                              Ispirata all'America! Un vero e proprio viaggio di sensazioni: vellutata, poi amara e infine fruttata grazie al dry-hopping di cascade. Assolutamente unica!",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => '64 d.C',
            'tipo' => 'Smoked Stout',
            'gradazione' => 5.5,
            'ibu' => 20,
            'ebc' => 7,
            'descrizione' => "Gusto predominante di affumicato, caffè e cioccolato. Ottima con selvaggina, pesce crudo, fois gras e formaggi stagionati.
                              Non temere il lato oscuro, magari ti piace! Sapore deciso di malto affumicato, caffè e cioccolata. Profumo che ricorda un falò estivo.",
            'contenitore' => 'Bottiglia',
            'formato' => '50cl',
        ]);

        Birra::create([
            'nome' => 'Egeria',
            'tipo' => 'Golden Ale',
            'gradazione' => 5.5,
            'ibu' => 15.9,
            'ebc' => 7,
            'descrizione' => 'Gusto erbaceo e floreale; perfetta con primi piatti saporiti, selvaggina e carne.
                              Non sottovalutare la bionda! Il luppolo saaz le dona un aroma speziato. È preziosa tanto quanto il suo colore dorato!',
            'contenitore' => 'Lattina',
            'formato' => '33cl',
        ]);

        Birra::create([
            'nome' => 'Malmostosa',
            'tipo' => 'Italian Grape Ale',
            'gradazione' => 5.5,
            'ibu' => 11.9,
            'ebc' => 16,
            'descrizione' => "Gusto fruttato e dolce di mosto d'uva; perfetta per i vostri aperitivi.
                              Birra o vino cosa scegli? La malmostosa è la scelta nel mezzo. Il mix perfetto dell'amaro della birra e il dolce fruttato del mosto d'uva.",
            'contenitore' => 'Lattina',
            'formato' => '33cl',
        ]);

        Birra::create([
            'nome' => 'Che Tipa',
            'tipo' => 'Indian Pale Ale',
            'gradazione' => 5,
            'ibu' => 21,
            'ebc' => 3,
            'descrizione' => "Gusto amaro dal forte sentore erbaceo; perfetta carni bianche e pesce.
                              Che Tipa! Interessante e decisa, amara e luppolosa. Un mosaic... di sapori di malto, luppolo e frutti tropicali.",
            'contenitore' => 'Lattina',
            'formato' => '33cl',
        ]);

        Birra::create([
            'nome' => 'Apache',
            'tipo' => 'American Pale Ale',
            'gradazione' => 6,
            'ibu' => 38,
            'ebc' => 15,
            'descrizione' => "Gusto amaro e vellutato aroma agrumato. Ottima con primi piatti leggeri, pesce e carni bianche.
                              Ispirata all'America! Un vero e proprio viaggio di sensazioni: vellutata, poi amara e infine fruttata grazie al dry-hopping di cascade. Assolutamente unica!",
            'contenitore' => 'Lattina',
            'formato' => '33cl',
        ]);

    }
}
