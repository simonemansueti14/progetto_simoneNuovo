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
          <th class="text-end">Azioni</th>
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
            <td class="text-end text-nowrap">
  @php
    $msg = "Confermi l'eliminazione della prenotazione di {$p->nome} del {$p->giorno} alle {$p->orario}?";
  @endphp
  <button type="button"
          class="btn btn-sm btn-danger"
          data-bs-toggle="modal"
          data-bs-target="#deleteModal"
          data-url="{{ route('admin.prenotazioni.destroy', $p->id) }}"
          data-nome="{{ $p->nome }}"
          data-giorno="{{ \Illuminate\Support\Str::of($p->giorno)->substr(0,10) }}"
          data-orario="{{ \Illuminate\Support\Str::of($p->orario)->substr(0,5) }}">
    <i class="bi bi-x-lg"></i>
  </button>
</td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-4">Nessuna prenotazione presente.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $prenotazioni->links() }}
  </div>
</div>

{{-- Modale conferma eliminazione --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#fff9e9;">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Conferma eliminazione</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        <p id="deleteModalText" class="mb-0">
          <!-- testo riempito via JS -->
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
        <form id="deleteForm" method="POST" action="#">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Script per popolare il modale --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const deleteModal = document.getElementById('deleteModal');
  const deleteText  = document.getElementById('deleteModalText');
  const deleteForm  = document.getElementById('deleteForm');

  deleteModal.addEventListener('show.bs.modal', function (event) {
    const btn    = event.relatedTarget; // bottone che ha aperto il modale
    const url    = btn.getAttribute('data-url');
    const nome   = btn.getAttribute('data-nome');
    const giorno = btn.getAttribute('data-giorno');
    const orario = btn.getAttribute('data-orario');

    deleteText.textContent =
      `Confermi l'eliminazione della prenotazione di ${nome} del ${giorno} alle ${orario}?`;
    deleteForm.setAttribute('action', url);
  });
});
</script>
@endsection
