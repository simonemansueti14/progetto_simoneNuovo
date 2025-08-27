@extends('layouts.app') <!-- estende il layout principale (quello descritto in app.layout) -->
@section('title', 'Home') <!-- Passa la stringa "Home" al layout, che viene inserita dove c’è @yield('title') nel <title> della pagina HTML. -->
@section('content') <!-- container, text-center, lead sono classi di Bootstrap per lo stile -->


<!---------------------------------------grafiche iniziali--------------------------------------->
<!-- Hero carpediem-style -->
<!--<header class="hero-header d-flex justify-content-between align-items-center px-4 py-3">
    <div class="container-fluid">
        <div class="row align-items-center w-100">
             Colonna logo 
            <div class="col-md-2">
                <div class="logo-container mx-auto animate-fade-in-delay position-relative">
                    <img src="{{ asset('img/logo3 senza sfondo.png') }}" alt="Logo Birrificio" class="logo">
                </div>
            </div>
             Colonna menu 
            <div class="col-md-10 text-end">
                <nav class="menu d-flex justify-content-end gap-4 position-relative">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/birre') }}">Birre</a>
                    <a href="{{ url('/eshop') }}">E-shop</a>
                    <a href="{{ url('/prenotazioni') }}">Prenotazioni</a>
                    <a href="{{ url('/chi-siamo') }}">Chi siamo</a>
                    <a href="{{ url('/contatti') }}">Contatti</a>
                </nav>
            </div>
        </div>
    </div>
</header> -->

<!-- Hero Carousel con due immagini -->
<div id="homeHeroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="carousel-hero-slide" style="background-image: url('/img/home-hero.jpeg');">
        <div class="carousel-caption d-flex justify-content-center align-items-center h-100">
          <h1 class="display-3 fw-bold text-light text-center">Birra artigianale con passione</h1>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <div class="carousel-hero-slide" style="background-image: url('/img/brindisi_montagna.jpeg');">
        <div class="carousel-caption d-flex justify-content-center align-items-center h-100">
          <h1 class="display-3 fw-bold text-light text-center">Direttamente da Calvisano dal 2015</h1>
        </div>
      </div>
    </div>

  </div>

  <!-- Frecce -->
  <button class="carousel-control-prev" type="button" data-bs-target="#homeHeroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Precedente</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#homeHeroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Successivo</span>
  </button>
</div>


<!----------------------------------------------------------------------------------------------->

<!---------------------------------------scopri birre--------------------------------------->
<!-- Sezione Scopri Birre -->
<section class="birra-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        <div class="col-md-6">
            <img src="{{ asset('img/bottiglie1.jpeg') }}" alt="Birrificio" class="w-100 h-100 object-fit-cover">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="birra-quote mb-4">"Dal nostro piccolo vogliamo offrirti una grande birra"</h2>
            <p class="lead">Scopri tutti i nostri prodotti!</p>
            <a href="{{ url('/birre') }}" class="btn btn-birre mt-3">Scopri le nostre birre</a>
        </div>
    </div>
</section>


<!----------------------------------------------------------------------------------------------->

<!---------------------------------------degustazione--------------------------------------->
<!-- Sezione Degustazione - Immagine a DESTRA -->
<section class="degustazione-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        
        <!-- Testo a sinistra -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="degustazione-title mb-4">La birra va gustata</h2>
            <p class="lead">Degustazioni pensate per un'esperienza immersiva nelle nostre birre...</p>
            <a href="{{ url('/prenotazioni') }}" class="btn btn-birre mt-3">Prenota una degustazione</a>
        </div>

        <!-- Immagine a destra -->
        <div class="col-md-6">
            <img src="{{ asset('img/img_degustazione.png') }}" alt="Degustazione" class="w-100 h-100 object-fit-cover">
        </div>
    </div>
</section>

<!----------------------------------------------------------------------------------------------->

<!---------------------------------------eshop--------------------------------------->
<section class="eshop-section">
    <div class="row g-0 align-items-center text-center text-md-start">
        
        <!-- Colonna immagine -->
        <div class="col-md-6">
            <img src="{{ asset('img/locale2.jpeg') }}" alt="E-shop" class="w-100 h-100 object-fit-cover">
        </div>

        <!-- Colonna testo -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4 p-lg-5">
            <h2 class="eshop-title mb-4">E-shop</h2>
            <p class="lead mb-4">Ordina le nostre birre artigianali direttamente da casa. Spediamo in tutta Italia!</p>
            <a href="{{ url('/eshop') }}" class="btn btn-birre mt-2">
                <i class="bi bi-cart4 me-2"></i> Acquista ora
            </a>
        </div>
    </div>
</section>

<!----------------------------------------------------------------------------------------------->

@endsection
<!----------------------------------------------------------------------------------------------->
