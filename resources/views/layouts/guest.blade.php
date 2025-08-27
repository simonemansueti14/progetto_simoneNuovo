<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Vite --}}
    @vite(['resources/js/app.js'])

    {{-- Il tuo CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root{
            --brand-bg: #5c3d2e;
            --brand-card: #f0eacc;
            --brand-brown: #6b4226;
            --brand-brown-hover: #5f3b22;
        }
        body.auth-body{
            background-color: var(--brand-bg);
        }
        .auth-card{
            border-radius: 0.75rem;
            background-color: var(--brand-card) !important;
            border: none;
        }
        .auth-input.form-control{
            border-color: var(--brand-brown) !important;
        }
        .auth-input.form-control:focus{
            border-color: var(--brand-brown) !important;
            box-shadow: 0 0 0 .2rem rgba(107,66,38,.15) !important;
        }
        .auth-submit.btn{
            background-color: var(--brand-brown);
            border-color: var(--brand-brown);
        }
        .auth-submit.btn:hover{
            background-color: var(--brand-brown-hover);
            border-color: var(--brand-brown-hover);
        }
        .auth-logo-wrapper{
            background-color: var(--brand-card);
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 1rem; /* spessore del cerchio */
        }
    </style>
</head>
<body class="font-sans antialiased auth-body">
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">

        {{-- LOGO con cerchio panna attorno --}}
        <div class="mb-4 text-center">
            <div class="auth-logo-wrapper">
                <img src="{{ asset('img/logo3 senza sfondo.png') }}" alt="Logo Birrificio"
                    class="img-fluid" style="max-height: 200px; width: auto;">



            </div>
        </div>

        {{-- CARD panna --}}
        <div class="container" style="max-width: 480px;">
            <div class="card shadow-sm auth-card">
                <div class="card-body p-4 p-md-5">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
