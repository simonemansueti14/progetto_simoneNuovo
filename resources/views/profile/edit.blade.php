<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- ===========================
                 Aggiornamento profilo
            =========================== --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- ===========================
                 Cambio password
            =========================== --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- ===========================
                 Eliminazione account
            =========================== --}}
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

                @if($prenotazioni->isEmpty())
                    <p class="text-gray-600">Non hai ancora prenotazioni.</p>
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
