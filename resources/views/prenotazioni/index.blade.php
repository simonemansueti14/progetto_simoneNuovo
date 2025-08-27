@extends('layouts.app')
@section('title', 'Prenotazioni')

@section('content')
<div class="container py-5" style="max-width: 760px">

  {{-- Titolo principale --}}
  <h1 class="prenotazioni-title text-center mb-4">Prenota la tua degustazione!</h1>
  <p class="prenotazioni-subtitle text-center mb-4">
    Compila il form sottostante per scegliere data e orario della tua prenotazione. Siamo aperti
    dal martedì al giovedì dalle 18:00 alle 22:00, e dal venerdì alla domenica dalle 16:00 alle 22:00.
  </p>

  {{-- SBARRAMENTO per i non autenticati --}}
  @guest
    <div class="card shadow-sm" style="background-color:#f0eacc;">
      <div class="card-body text-center p-4">
        <p class="mb-4 fs-5">Per entrare nella pagina prenotazioni è necessario il login.</p>
        <div class="d-flex justify-content-center gap-3">
          <a href="{{ route('login', ['redirectTo' => route('prenotazioni')]) }}" class="btn btn-primary">Accedi</a>
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
          <input type="number"
                 id="posti"
                 name="posti"
                 min="1" max="50"
                 class="form-control @error('posti') is-invalid @enderror"
                 value="{{ old('posti') }}"
                 required>
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
          <button type="submit" class="btn btn-primary">Conferma prenotazione</button>
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
          let range = null;
          if (dayOfWeek === 1) {
            selectOra.innerHTML = '<option value="">Il lunedì siamo chiusi</option>';
            selectOra.disabled = true;
            return;
          }
          if (dayOfWeek >= 2 && dayOfWeek <= 4) range = ['18:00', '22:00'];
          if (dayOfWeek === 5 || dayOfWeek === 6 || dayOfWeek === 0) range = ['16:00', '22:00'];

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
          const dow = d.getDay();
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
            const oldTime = selectOra.dataset.old || '';
            if (oldTime) {
              const opt = Array.from(selectOra.options).find(o => o.value === oldTime);
              if (opt) selectOra.value = oldTime;
            }
          }
        }

        inputGiorno.addEventListener('change', onDayChange);
        onDayChange();
      });
    </script>

    {{-- ===================== ELENCO PRENOTAZIONI (SOLO ADMIN, INLINE) ===================== --}}
    @if(auth()->check() && auth()->user()->role === 'admin' && isset($prenotazioni))
      <hr class="my-5">
      <h2 class="mb-3">Tutte le prenotazioni</h2>

      <div class="card shadow-sm">
        <div class="card-body p-0">
          <table class="table table-striped table-hover mb-0">
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
                  <td>
                    {{ $p->nome }}
                    @if($p->user && $p->user->email)
                      <div class="small text-muted">{{ $p->user->email }}</div>
                    @endif
                  </td>
                  <td>{{ $p->note }}</td>
                  <td>{{ optional($p->created_at)->format('d/m/Y H:i') }}</td>
                  <td class="text-end">
                    {{-- Pulsante modifica (placeholder) --}}
                    <a href="#" class="btn btn-sm btn-outline-secondary me-1" title="Modifica">✎</a>

                    {{-- Pulsante elimina --}}
                   <form method="POST"
      action="{{ route('admin.prenotazioni.destroy', $p) }}"
      class="d-inline"
      onsubmit="return confirm('Confermi l\'eliminazione della prenotazione di {{ addslashes($p->nome) }} del {{ date('d/m/Y', strtotime($p->giorno)) }} alle {{ date('H:i', strtotime($p->orario)) }}?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" title="Elimina">✖</button>
</form>


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
      </div>
    @endif
    {{-- =================== /ELENCO PRENOTAZIONI (SOLO ADMIN, INLINE) ==================== --}}

    {{-- FAB admin che porta alla pagina dedicata --}}
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

  @endauth

</div>
@endsection
