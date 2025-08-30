<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Vite --}}
    @vite(['resources/js/app.js'])

    {{-- CSS custom --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="font-sans antialiased d-flex flex-column min-vh-100" style="background-color:#fffbea;">
    {{-- NAVBAR --}}
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
                        <a href="{{ route('prenotazioni') }}">Degustazioni</a>

                        @auth
                            @can('access-admin')
                                <a href="{{ route('admin.dashboard') }}">Admin</a>
                            @endcan
                        @endauth

                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.utenti.index') }}">Utenti</a>
                            @endif
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
                                    <a class="dropdown-item" href="{{ route('prenotazioni.mie') }}">
                                        Le tue prenotazioni
                                    </a>
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

    {{-- Page Header opzionale --}}
    @hasSection('header')
        <header class="bg-white shadow">
            <div class="container py-4">
                @yield('header')
            </div>
        </header>
    @endif

    {{-- CONTENUTO PAGINA --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

    {{-- FOOTER --}}
    <footer class="custom-footer py-4">
        <div class="container">
            <div class="row align-items-center">
                {{-- Info a sinistra --}}
                <div class="col-md-6 text-md-start text-center footer-info">
                    <p>&copy; {{ date('Y') }} Birrificio Carpe Diem. Tutti i diritti riservati.</p>
                    <p class="footer-address">Via Cavalier Bordogna trav. 2, 17, Calvisano (BS)</p>
                    <p class="footer-address">birrificio.carpediem@gmail.com</p>
                    <p class="footer-address">3393665044 / 3358088404</p>
                </div>

                {{-- Social a destra --}}
                <div class="col-md-6 text-md-end text-center footer-social">
                    <a href="https://www.facebook.com/birrificio.carpediem/?locale=it_IT" target="_blank" class="me-3">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/birrificio.carpediem/" target="_blank" class="me-3">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
