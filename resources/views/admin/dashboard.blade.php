@extends('layouts.app')
@section('title', 'Admin • Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Area Amministratore</h1>

    <div class="alert alert-info">
        Ciao {{ auth()->user()->name }}, benvenuto nella dashboard admin.
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="p-4 border rounded bg-light h-100">
                <h5 class="mb-2">Prodotti</h5>
                <p class="mb-3">Gestisci birre, descrizioni, prezzi, disponibilità…</p>
                <a href="{{ route('admin.products.index') }}" class="btn btn-birre">Vai ai prodotti</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 border rounded bg-light h-100">
                <h5 class="mb-2">Ordini</h5>
                <p class="mb-3">Monitora e aggiorna lo stato degli ordini.</p>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-birre">Vai agli ordini</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 border rounded bg-light h-100">
                <h5 class="mb-2">Utenti</h5>
                <p class="mb-3">Gestisci ruoli e permessi degli utenti.</p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-birre">Vai agli utenti</a>
            </div>
        </div>
    </div>
</div>
@endsection
