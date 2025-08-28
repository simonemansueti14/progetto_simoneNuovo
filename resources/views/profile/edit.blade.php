<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <p>DEBUG count = {{ isset($prenotazioni) ? $prenotazioni->count() : 'null' }}</p>

    </x-slot>

    <p style="padding:8px">DEBUG count = {{ isset($prenotazioni) ? $prenotazioni->count() : 'null' }}</p>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            {{-- ===========================
     Le mie prenotazioni
     =========================== --}}
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
  <h2 class="text-lg font-medium text-gray-900 mb-4">Le mie prenotazioni</h2>

  @if(!isset($prenotazioni) || $prenotazioni->isEmpty())
    <div>Non hai ancora prenotazioni.</div>
  @else
    <div class="table-responsive">
      <table class="table align-middle" style="width:100%; border-collapse:collapse;">
        <thead>
          <tr>
            <th style="text-align:left; padding:6px;">Giorno</th>
            <th style="text-align:left; padding:6px;">Orario</th>
            <th style="text-align:left; padding:6px;">Ospiti</th>
            <th style="text-align:left; padding:6px;">Nome</th>
            <th style="text-align:left; padding:6px;">Note</th>
            <th style="text-align:left; padding:6px;">Creata il</th>
          </tr>
        </thead>
        <tbody>
          @foreach($prenotazioni as $p)
            @php
              $giorno  = (string)($p->giorno ?? '');
              $orario  = (string)($p->orario ?? '');
              if (strlen($orario) > 5) { $orario = substr($orario,0,5); } // HH:MM
              $creata  = $p->created_at ? $p->created_at->format('d/m/Y H:i') : '';
            @endphp
            <tr>
              <td style="padding:6px;">{{ $giorno }}</td>
              <td style="padding:6px;">{{ $orario }}</td>
              <td style="padding:6px;">{{ $p->posti }}</td>
              <td style="padding:6px;">{{ $p->nome }}</td>
              <td style="padding:6px; max-width:380px;">{{ $p->note }}</td>
              <td style="padding:6px;">{{ $creata }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>
        </div>
    </div>
</x-app-layout> 

