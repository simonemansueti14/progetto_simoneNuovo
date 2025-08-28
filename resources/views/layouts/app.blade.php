<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Google Fonts (se usi Merriweather/Playfair ecc.) --}}
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons (per l’icona utente) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Assets Vite di Breeze (solo JS va benissimo) --}}
    @vite(['resources/js/app.js'])

    {{-- Il tuo CSS custom --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="font-sans antialiased" style="background-color:#fffbea;">
    {{-- NAVBAR MARRONE PERSONALIZZATA --}}
    <header class="hero-header d-flex justify-content-between align-items-center px-4 py-3 bg-brown">
        <div class="container-fluid">
            <div class="row align-items-center w-100">
                {{-- Logo --}}
                <div class="col-md-2">
                    <div class="logo-container mx-auto position-relative">
                        <img src="{{ asset('img/logo3 senza sfondo.png') }}" alt="Logo Birrificio" class="logo">
                    </div>
                </div>

                {{-- Menu --}}
                <div class="col-md-10 text-end">
                    <nav class="menu d-flex gap-4 align-items-center justify-content-end">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('birre.index') }}">Birre</a>
                        <a href="{{ route('chi-siamo') }}">Chi Siamo</a>
                        <a href="{{ route('contatti') }}">Contatti</a>
                        <a href="{{ route('prenotazioni') }}">Prenotazioni</a>

                        @auth
                            @can('access-admin') {{-- definito nelle tue policy/gates --}}
                                <a href="{{ route('admin.dashboard') }}">Admin</a>
                            @endcan
                        @endauth

                        {{-- Icona utente con dropdown --}}
                        <div class="dropdown user-menu">
                            <a href="#" class="nav-link d-inline-flex align-items-center"
                               id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Account">
                                <i class="bi bi-person-circle fs-4"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                @guest
                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">Registrati</a>
                                    @endif
                                @endguest

                                @auth
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profilo</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    {{-- Page Header opzionale (se qualche view fa @section('header')) --}}
    @hasSection('header')
        <header class="bg-white shadow">
            <div class="container py-4">
                @yield('header')
            </div>
        </header>
    @endif

    {{-- CONTENUTO PAGINA --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
