@extends('layouts.app')

@section('title', 'Contatti')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-5 section-heading">Contatti</h2>

    <div class="row g-4">

        <!-- Riquadro 1 - Telefono ed Email -->
        <div class="col-12">
            <div class="contact-card shadow-sm p-4">
                <h4 class="mb-3 fs-3 dati-card"><strong>Contattaci</strong></h4>
                <p><strong>Telefono:</strong> +39 339 366 5044</p>
                <p><strong>Telefono:</strong> +39 335 808 8404</p>
                <p><strong>Email:</strong> birrificio.carpediem@gmail.com</p>
            </div>
        </div>

        <!-- Riquadro 2 - Orari -->
        <div class="col-12">
            <div class="contact-card shadow-sm p-4">
                <h4 class="mb-3 fs-3"><strong>Orari di apertura</strong></h4>
                <p><strong>Venerdì:</strong> 16:00 - 20:00</p>
                <p><strong>Sabato:</strong> 10:00 - 12:00 / 16:00 - 20:00</p>
                <p><strong>Domenica:</strong> Chiuso</p>
            </div>
        </div>

        <!-- Riquadro 3 - Mappa -->
        <div class="col-12">
    <div class="contact-card shadow-sm p-0">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2914.2744902599247!2d10.337568276388849!3d45.33436957107203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4781a4c23e727d57%3A0xacb6c5f87ebd482!2sBirrificio%20Carpediem!5e1!3m2!1sit!2sit!4v1754920771400!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            width="100%" height="400" style="border:0; display:block;"
            allowfullscreen="" loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>


    </div>

</div>
@endsection


