@extends('layouts.app')
@section('title', 'Prenotazioni')

@section('content')
<div class="container py-5" style="max-width: 760px">

  {{-- Titolo principale --}}
  <h1 class="text-center mb-4 prenotazioni-title">Prenota la tua degustazione!</h1>
  <h2 class="text-center mb-4 prenotazioni-subtitle">Siamo aperti dal martedì al 
    giovedì dalle 18:00 alle 22:00, e dal venerdi alla domenica dalle 16:00 alle 22:00 <br>
    Scegli una data e un orario, al resto ci pensiamo noi!
  </h2>
  <h3 class="text-center mb-4 prenotazioni-subsubtitle">Si accettano prenotazioni per un numero minimo di 4 persone.</h3>

  @guest
    {{-- SBARRAMENTO per i non autenticati --}}
    <div class="card shadow-sm" style="background-color:#f0eacc;">
      <div class="card-body text-center p-4">
        <p class="mb-4 fs-5">Per effettuare una prenotazione è necessario il login.</p>
        <div class="d-flex justify-content-center gap-3">
          <a href="{{ route('login', ['redirectTo' => route('prenotazioni')]) }}" class="btn btn-birre">
              Accedi
          </a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-dark">Registrati</a>
          @endif
        </div>
      </div>
    </div>
  @endguest

  @auth
    {{-- Messaggi --}}
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    {{-- Errori --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
          @foreach ($errors->all() as $error)
            <li class="mb-0">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- FORM PRENOTAZIONE --}}
    <form method="POST" action="{{ route('prenotazioni.store') }}" class="card shadow-sm">
      @csrf
      <div class="card-body p-4" style="background-color:#f0eacc;">

        {{-- Scegli il giorno --}}
        <div class="mb-3">
          <label for="giorno" class="form-label">Scegli il giorno</label>
          <input
              type="date"
              id="giorno"
              name="giorno"
              class="form-control @error('giorno') is-invalid @enderror"
              value="{{ old('giorno') }}"
              min="{{ now()->toDateString() }}"
              required>
          <div id="giornoHelp" class="form-text text-danger"></div>
          @error('giorno') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Scegli l'orario (SELECT dinamica) --}}
        <div class="mb-3">
          <label for="orario" class="form-label">Scegli l'orario</label>
          <select
            id="orario"
            name="orario"
            class="form-select @error('orario') is-invalid @enderror"
            data-old="{{ old('orario') }}"
            {{ old('giorno') ? '' : 'disabled' }}
            required>
            <option value="">Seleziona prima il giorno</option>
          </select>
          @error('orario') <div class="invalid-feedback">{{ $message }}</div> @enderror
          <div id="orarioHelp" class="form-text text-danger"></div>
        </div>

        {{-- Numero ospiti --}}
        <div class="mb-3">
          <label for="posti" class="form-label">Numero di ospiti</label>
          <select id="posti"
        name="posti"
        class="form-select @error('posti') is-invalid @enderror"
        required>
  @for ($i = 4; $i <= 50; $i++)
    <option value="{{ $i }}" {{ old('posti') == $i ? 'selected' : '' }}>
      {{ $i }}
    </option>
  @endfor
</select>

          @error('posti') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Note del cliente --}}
        <div class="mb-3">
          <label for="note" class="form-label">Note del cliente</label>
          <textarea id="note"
                    name="note"
                    rows="3"
                    class="form-control @error('note') is-invalid @enderror"
                    placeholder="Eventuali richieste particolari...">{{ old('note') }}</textarea>
          @error('note') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Conferma --}}
        <div class="text-center">
          <button type="submit" class="btn btn-birre">Conferma prenotazione</button>
        </div>

      </div>
    </form>

    {{-- Script: blocca i lunedì + popola orari validi per giorno --}}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const inputGiorno = document.getElementById('giorno');
        const helpGiorno  = document.getElementById('giornoHelp');
        const selectOra   = document.getElementById('orario');
        const helpOra     = document.getElementById('orarioHelp');

        // Genera uno slot ogni 30 minuti tra start e end (stringhe "HH:MM")
        function generateSlots(start, end) {
          const slots = [];
          const [sh, sm] = start.split(':').map(Number);
          const [eh, em] = end.split(':').map(Number);
          let d = new Date();
          d.setHours(sh, sm, 0, 0);
          const limit = new Date();
          limit.setHours(eh, em, 0, 0);

          while (d <= limit) {
            const hh = String(d.getHours()).padStart(2, '0');
            const mm = String(d.getMinutes()).padStart(2, '0');
            slots.push(`${hh}:${mm}`);
            d.setMinutes(d.getMinutes() + 30);
          }
          return slots;
        }

        function fillTimeOptions(dayOfWeek) {
          // dayOfWeek: 0=Dom, 1=Lun, 2=Mar, 3=Mer, 4=Gio, 5=Ven, 6=Sab
          let range = null;

          if (dayOfWeek === 1) { // Monday
            // lunedì: non selezionabile
            selectOra.innerHTML = '<option value="">Il lunedì siamo chiusi</option>';
            selectOra.disabled = true;
            return;
          }

          // mar(2)-gio(4): 18:00-22:00
          if (dayOfWeek >= 2 && dayOfWeek <= 4) {
            range = ['18:00', '22:00'];
          }
          // ven(5)-dom(0): 16:00-22:00
          if (dayOfWeek === 5 || dayOfWeek === 6 || dayOfWeek === 0) {
            range = ['16:00', '22:00'];
          }

          if (!range) {
            selectOra.innerHTML = '<option value="">Nessun orario disponibile</option>';
            selectOra.disabled = true;
            return;
          }

          const slots = generateSlots(range[0], range[1]);
          selectOra.innerHTML = '<option value="">Seleziona un orario</option>' +
            slots.map(t => `<option value="${t}">${t}</option>`).join('');
          selectOra.disabled = false;
        }

        function onDayChange() {
          helpGiorno.textContent = '';
          helpOra.textContent = '';

          if (!inputGiorno.value) {
            selectOra.innerHTML = '<option value="">Seleziona prima il giorno</option>';
            selectOra.disabled = true;
            return;
          }

          const d = new Date(inputGiorno.value);
          const dow = d.getDay(); // 0=Dom...1=Lun...6=Sab
          const isMonday = dow === 1;

          if (isMonday) {
            inputGiorno.setCustomValidity('Il lunedì non è selezionabile.');
            helpGiorno.textContent = 'Il lunedì siamo chiusi: scegli un altro giorno.';
            selectOra.innerHTML = '<option value="">Nessun orario disponibile</option>';
            selectOra.disabled = true;
            inputGiorno.reportValidity();
          } else {
            inputGiorno.setCustomValidity('');
            helpGiorno.textContent = '';
            fillTimeOptions(dow);

            // Recupera l'eventuale old('orario') dal data-attribute del select
            const oldTime = selectOra.dataset.old || '';
            if (oldTime) {
              const opt = Array.from(selectOra.options).find(o => o.value === oldTime);
              if (opt) selectOra.value = oldTime;
            }
          }
        }

        inputGiorno.addEventListener('change', onDayChange);

        // Inizializzazione: se esiste già un giorno (old value), popola subito
        onDayChange();
      });
    </script>

    {{-- FAB admin esistente --}}
    @if(auth()->check() && auth()->user()->role === 'admin')
      <a href="{{ route('admin.prenotazioni.index') }}"
        class="btn btn-dark admin-fab"
        title="Vedi tutte le prenotazioni">📋</a>

      <style>
        .admin-fab{
          position: fixed;
          right: 24px;
          bottom: 24px;
          border-radius: 9999px;
          padding: 12px 16px;
          box-shadow: 0 6px 16px rgba(0,0,0,.25);
          z-index: 1050;
        }
        .admin-fab:hover{ transform: translateY(-1px); }
      </style>
    @endif

    {{-- TABELLA ADMIN con Azioni (mostrata solo se admin e $prenotazioni è passato dal controller) --}}
    @if(auth()->user()->role === 'admin' && isset($prenotazioni))
      <hr class="my-5">
      <h2 class="h5 mb-3">Gestione prenotazioni</h2>

      @if($prenotazioni->count() === 0)
        <div class="alert alert-info">Nessuna prenotazione presente.</div>
      @else
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Giorno</th>
                <th>Orario</th>
                <th>Posti</th>
                <th>Utente/Email</th>
                <th class="text-end">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($prenotazioni as $p)
                <tr>
                  <td>{{ $p->nome }}</td>
                  <td>{{ $p->giorno }}</td>
                  <td>{{ $p->orario }}</td>
                  <td>{{ $p->posti }}</td>
                  <td>
                    @php
                      $email = optional($p->user)->email ?? $p->email ?? '';
                    @endphp
                    {{ $email }}
                  </td>
                  <td class="text-end text-nowrap">


                    {{-- Pulsante elimina con conferma (senza @json/addslashes) --}}
                    @php
                      $msg = "Confermi l'eliminazione della prenotazione di {$p->nome} del {$p->giorno} alle {$p->orario}?";
                    @endphp
                    <form
                        action="{{ route('prenotazioni.destroy', $p->id) }}"
                        method="POST"
                        class="d-inline"
                        data-confirm="{{ e($msg) }}"
                        onsubmit="return confirm(this.dataset.confirm);">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    @endif

  @endauth

</div>
@endsection
