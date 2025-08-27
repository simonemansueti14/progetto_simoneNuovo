@extends('layouts.app')

@section('title', 'Birre')

@section('content')
    <h2>Le nostre birre</h2>
    <p>Produciamo birre artigianali con passione e ingredienti locali.</p>

    <div class="beer-carousel-container">
    <button class="carousel-btn left" onclick="scrollBeers(-1)">&#10094;</button>

    <div class="beer-carousel" id="beerCarousel">
        <div class="beer-item">
            <img src="{{ asset('img/beer1.png') }}" alt="Beer 1">
            <h3 class="beer-name">FINISTERRÆ</h3>
            <p class="beer-type">ITALIAN WHITE</p>
        </div>
        <div class="beer-item">
            <img src="{{ asset('img/beer2.png') }}" alt="Beer 2">
            <h3 class="beer-name">FLEURETTE</h3>
            <p class="beer-type">SUMMER ALE</p>
        </div>
        <div class="beer-item">
            <img src="{{ asset('img/beer3.png') }}" alt="Beer 3">
            <h3 class="beer-name">POLOCK EN ROUGE</h3>
            <p class="beer-type">SOUR FRUIT GRODZISKIE</p>
        </div>
        <!-- Aggiungi altre birre qui -->
    </div>

    <button class="carousel-btn right" onclick="scrollBeers(1)">&#10095;</button>
</div>

@endsection

