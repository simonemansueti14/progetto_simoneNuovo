<?php

namespace App\Http\Controllers;

use App\Models\Birra;

class BirraController extends Controller
{
    public function index()
    {
        $egeria = Birra::where('nome', 'Egeria')->first();
        $mithra = Birra::where('nome', 'Mithra')->first();
        $maya = Birra::where('nome', 'Maya')->first();
        $apache = Birra::where('nome', 'Apache')->first();
        $avus = Birra::where('nome', 'Avus')->first();
        $sessantaquattrodc = Birra::where('nome', '64 d.C')->first();
        $alemonia = Birra::where('nome', 'Alemonia')->first();
        $malmostosa = Birra::where('nome', 'Malmostosa')->first();
        $chetipa = Birra::where('nome', 'Che Tipa')->first();

        return view('birre.index', compact('egeria', 'mithra', 'maya', 'apache', 'avus', 'sessantaquattrodc', 'alemonia', 'malmostosa', 'chetipa'));
    }

}
