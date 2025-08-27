@extends('layouts.app')
@section('title', 'Tutte le prenotazioni')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4 m-0">Tutte le prenotazioni</h1>
    <a href="{{ route('prenotazioni') }}" class="btn btn-outline-secondary">← Torna alle prenotazioni</a>
  </div>

  <div class="table-responsive shadow-sm">
    <table class="table table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Giorno</th>
          <th>Orario</th>
          <th>Ospiti</th>
          <th>Nome</th>
          <th>Note</th>
          <th>Creata il</th>
        </tr>
      </thead>
      <tbody>
        @forelse($prenotazioni as $p)
          <tr>
            <td>{{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}</td>
            <td>{{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}</td>
            <td>{{ $p->posti }}</td>
            <td>{{ $p->nome }}</td>
            <td style="max-width: 380px;">{{ $p->note }}</td>
            <td>{{ optional($p->created_at)->format('d/m/Y H:i') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-4">Nessuna prenotazione presente.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $prenotazioni->links() }}
  </div>
</div>
@endsection
