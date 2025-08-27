@extends('layouts.guest')
@section('title', 'Recupera password')

@section('content')
    <h1 class="h4 fw-bold mb-3 text-center">Recupera password</h1>
    <p class="small auth-muted mb-4 text-center">
        Inserisci la tua email: ti invieremo un link per reimpostare la password.
    </p>

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

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus class="form-control auth-input">
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}" class="small auth-muted text-decoration-none">Torna al login</a>
            <button type="submit" class="btn btn-primary auth-submit">Invia link</button>
        </div>
    </form>
@endsection
