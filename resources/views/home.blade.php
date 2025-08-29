@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!---------------------------------------hero statico--------------------------------------->
<section class="hero-static d-flex justify-content-center align-items-center text-center">
    <div class="hero-text">
        <h1>BIRRIFICIO CARPEDIEM</h1>
        <p>"Cogli l'attimo, cogli la birra quando è il momento"</p>
    </div>
</section>
<!------------------------------------------------------------------------------------------->

<!---------------------------------------scopri birre--------------------------------------->
<!-- Sezione Scopri Birre -->
<section class="birra-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        <div class="col-md-6">
            <img src="{{ asset('img/bottiglie1.jpeg') }}" alt="Birrificio" class="w-100 h-100 object-fit-cover">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="scopribirre-title mb-4 text-center">"Dal nostro piccolo vogliamo offrirti una grande birra"</h2>
            <p class="lead scopribirre-subtitle">Scopri tutti i nostri prodotti!</p>
            <a href="{{ url('/birre') }}" class="btn btn-birre mt-3">Le nostre birre</a>
        </div>
    </div>
</section>

<!----------------------------------------------------------------------------------------------->

<!---------------------------------------degustazione--------------------------------------->
<section class="degustazione-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        <!-- Testo a sinistra -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="degustazione-title mb-4">La birra va gustata</h2>
            <p class="lead degustazione-subtitle">Degustazioni pensate per un'esperienza immersiva nelle nostre birre...</p>
            <a href="{{ url('/prenotazioni') }}" class="btn btn-birre mt-3">Prenota una degustazione</a>
        </div>
        <!-- Immagine a destra -->
        <div class="col-md-6">
            <img src="{{ asset('img/img_degustazione.png') }}" alt="Degustazione" class="w-100 h-100 object-fit-cover">
        </div>
    </div>
</section>

<!----------------------------------------------------------------------------------------------->

<!---------------------------------------contatti--------------------------------------->
<section class="contatti-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        <!-- Colonna immagine -->
        <div class="col-md-6">
            <img src="{{ asset('img/locale2.jpeg') }}" alt="Contatti" class="w-100 h-100 object-fit-cover">
        </div>
        <!-- Colonna testo -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="eshop-title mb-4">Scopri come trovarci</h2>
            <a href="{{ url('/contatti') }}" class="btn btn-birre mt-2">
                 Contatti
            </a>
        </div>
    </div>
</section>
<!----------------------------------------------------------------------------------------------->

@endsection
