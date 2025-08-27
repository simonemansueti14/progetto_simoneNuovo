@extends('layouts.app')

@section('title', 'Chi siamo')

@section('content')
<div class="container py-5 chi-siamo-page">

    <!-- Titolo -->
    <h2 class="text-center mb-5 section-heading animate-fade-in">Il Birrificio</h2>

    <!-- Riga 1 -->
    <div class="row align-items-center mb-5 animate-fade-in delay-1">
        <div class="col-md-6">
            <img src="{{ asset('img/brindisi_montagna.jpeg') }}" alt="Foto birrificio" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <p>
                Tutto ha inizio a Calvisano (BS) nel 2015, quando per fronteggiare la sete dei primi affezionati abbiamo deciso di acquistare il nostro attuale impianto di produzione, cogliendo così quell’attimo tanto funesto ma necessario per dare vita al <strong>birrificio artigianale Carpe Diem</strong>.
            </p>
        </div>
    </div>

    <!-- Separatore -->
    <div class="pattern-separator my-5"></div>

    <!-- Riga 2 (immagine a destra su desktop) -->
    <div class="row align-items-center mb-5 flex-md-row-reverse animate-fade-in delay-2">
        <div class="col-md-6">
            <img src="{{ asset('img/brindisi_montagna.jpeg') }}" alt="Produzione birra" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <p>
                L’idea diventa realtà solo alcuni anni dopo che <strong>Michela</strong> aveva regalato a <strong>Mastro Gianni</strong> il suo primo kit da home brewer. Materie prime di <strong>qualità</strong>, <strong>cura</strong> del processo e tantissima <strong>passione</strong>.
            </p>
        </div>
    </div>

    <!-- Separatore -->
    <div class="pattern-separator my-5"></div>

    <!-- Riga 3 -->
    <div class="row align-items-center mb-5 animate-fade-in delay-3">
        <div class="col-md-6">
            <img src="{{ asset('img/brindisi_montagna.jpeg') }}" alt="Brindisi in montagna" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <p>
                Oggi Carpe Diem non è più una semplice realtà locale, ma sta crescendo in tutta la Lombardia e non solo. La passione è rimasta la stessa e ci motiva ogni giorno ad immaginare e a produrre <strong>birra unica</strong>.</p>
        </div>
    </div>

</div>
@endsection
