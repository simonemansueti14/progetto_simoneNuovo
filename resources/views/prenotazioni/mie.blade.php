@extends('layouts.app')

@section('title', 'Le tue prenotazioni')

@section('content')
<div class="container py-5">
    <h1 class="h4 mb-4">Le tue prenotazioni</h1>
    {{-- Toast container (in alto a destra) --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    {{-- Toast successo --}}
    @if (session('success'))
        <div id="toastSuccess" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
        <div class="d-flex">
            <div class="toast-body">
            {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
    @endif

    {{-- Toast errori (se presenti) --}}
    @if ($errors->any())
        <div id="toastError" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="6000">
        <div class="d-flex">
            <div class="toast-body">
            <strong>Ops!</strong>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                <li class="mb-0">{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
    @endif
    </div>

    {{-- Avvio automatico dei toast se presenti --}}
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    const s = document.getElementById('toastSuccess');
    const e = document.getElementById('toastError');
    if (s) new bootstrap.Toast(s).show();
    if (e) new bootstrap.Toast(e).show();
    });
    </script>


    @if($prenotazioni->isEmpty())
        <p>Non hai ancora prenotazioni.</p>
    @else
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
                    @foreach($prenotazioni as $p)
                        <tr>
                            <td>{{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}</td>
                            <td>{{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}</td>
                            <td>{{ $p->posti }}</td>
                            <td>{{ $p->nome }}</td>
                            <td style="max-width:380px;">{{ $p->note }}</td>
                            <td>{{ optional($p->created_at)->format('d/m/Y H:i') }}</td>
                            <td class="text-end text-nowrap">
                                <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-url="{{ route('prenotazioni.mine.destroy', $p->id) }}"
                                        data-nome="{{ $p->nome }}"
                                        data-giorno="{{ \Illuminate\Support\Str::of($p->giorno)->substr(0,10) }}"
                                        data-orario="{{ \Illuminate\Support\Str::of($p->orario)->substr(0,5) }}">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $prenotazioni->links() }}
        </div>
    @endif
</div>

{{-- Modale di conferma --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Conferma eliminazione</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        <p id="deleteDetails" class="mb-0"></p>
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

{{-- Script per popolare la modale --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const modalEl   = document.getElementById('deleteModal');
  const detailsEl = document.getElementById('deleteDetails');
  const formEl    = document.getElementById('deleteForm');

  modalEl.addEventListener('show.bs.modal', (event) => {
    const btn    = event.relatedTarget;
    const url    = btn.getAttribute('data-url');
    const nome   = btn.getAttribute('data-nome');
    const giorno = btn.getAttribute('data-giorno');
    const orario = btn.getAttribute('data-orario');

    detailsEl.textContent = `Confermi l'eliminazione della prenotazione di ${nome} del ${giorno} alle ${orario}?`;
    formEl.setAttribute('action', url);
  });
});
</script>
@endsection
