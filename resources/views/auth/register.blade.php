@extends('layouts.guest')
@section('title', 'Registrazione')

@section('content')
    <h1 class="h4 fw-bold mb-4 text-center">Registrati</h1>

    {{-- Errori di validazione --}}
    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li class="mb-0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" 
                   required autofocus autocomplete="name"
                   class="form-control auth-input">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autocomplete="username"
                   class="form-control auth-input">
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" 
                   required autocomplete="new-password"
                   class="form-control auth-input">
        </div>

        {{-- Conferma password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Conferma Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   required autocomplete="new-password"
                   class="form-control auth-input">
        </div>

        {{-- Link login + pulsante --}}
        <div class="d-flex justify-content-between align-items-center">
            <a class="small auth-muted text-decoration-none" href="{{ route('login') }}">
                Hai già un account?
            </a>
            <button type="submit" class="btn btn-primary auth-submit">
                Registrati
            </button>
        </div>
    </form>
@endsection
