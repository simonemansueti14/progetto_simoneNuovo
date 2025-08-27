<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function birre() {
        return view('birre');
    }

    public function eshop() {
        return view('eshop');
    }

    public function prenotazioni() {
        return view('prenotazioni');
    }

    public function chiSiamo() {
        return view('chi-siamo');
    }

    public function contatti() {
        return view('contatti');
    }
}

