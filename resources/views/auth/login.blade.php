@extends('layouts.guest')
@section('title', 'Login')

@section('content')
    <h1 class="h4 fw-bold mb-4 text-center">Accedi</h1>

    {{-- Messaggi di stato / errori --}}
    @if (session('status'))
        <div class="alert alert-success small">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li class="mb-0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM LOGIN --}}
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required autofocus autocomplete="username"
                   class="form-control auth-input">
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password"
                   type="password"
                   name="password"
                   required autocomplete="current-password"
                   class="form-control auth-input">
        </div>

        {{-- Remember me + forgot --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Ricordami</label>
            </div>

            @if (Route::has('password.request'))
                <a class="small auth-muted text-decoration-none" href="{{ route('password.request') }}">
                    Password dimenticata?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <div class="d-grid">
            <button type="submit" class="btn btn-primary auth-submit">
                Accedi
            </button>
        </div>

        {{-- Link a registrazione --}}
        @if (Route::has('register'))
            <p class="small text-center mt-3 mb-0">
                Non hai un account?
                <a href="{{ route('register') }}" class="text-decoration-none">Registrati</a>
            </p>
        @endif
    </form>
@endsection
