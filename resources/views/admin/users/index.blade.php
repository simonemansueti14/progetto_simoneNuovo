@extends('layouts.app')
@section('title', 'Utenti')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4 m-0">Utenti</h1>

    <form method="GET" action="{{ route('admin.utenti.index') }}" class="d-flex gap-2">
      <input type="search"
             name="q"
             value="{{ $q ?? '' }}"
             class="form-control"
             placeholder="Cerca per nome o email">
      <button class="btn btn-outline-secondary" type="submit">Cerca</button>
    </form>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <div class="table-responsive shadow-sm">
    <table class="table table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Ruolo</th>
          <th>Registrato il</th>
          <th class="text-center" style="width:120px;">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $u)
          <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>
              <span class="badge {{ $u->role === \App\Models\User::ROLE_ADMIN ? 'bg-danger' : 'bg-secondary' }}">
                {{ $u->role }}
              </span>
            </td>
            <td>{{ optional($u->created_at)->format('d/m/Y H:i') }}</td>
            <td class="text-center">
              @if($u->role === \App\Models\User::ROLE_USER)
                {{-- Form nascosto per DELETE --}}
                <form id="del-user-{{ $u->id }}" action="{{ route('admin.utenti.destroy', $u) }}" method="POST" class="d-none">
                  @csrf
                  @method('DELETE')
                </form>

                {{-- Bottone con SweetAlert --}}
                <button
                  type="button"
                  class="btn btn-sm btn-danger btn-delete-user"
                  data-form="#del-user-{{ $u->id }}"
                  data-name="{{ $u->name }}"
                  data-email="{{ $u->email }}"
                  title="Elimina utente">
                  <i class="bi bi-x-lg text-white"></i>
                </button>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-4">Nessun utente trovato.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $users->links() }}
  </div>
</div>
@endsection

{{-- SweetAlert2 + handler --}}
@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('.btn-delete-user');
      if (!btn) return;

      const formSelector = btn.getAttribute('data-form');
      const nome = btn.getAttribute('data-name') || 'utente';
      const email = btn.getAttribute('data-email') || '';
      const form = document.querySelector(formSelector);
      if (!form) return;

      Swal.fire({
        title: 'Confermi eliminazione?',
        html: `<div class="text-start">
                 <div><strong>Nome:</strong> ${nome}</div>
                 ${email ? `<div><strong>Email:</strong> ${email}</div>` : ''}
                 <div class="mt-2 text-danger small">Questa azione non è reversibile.</div>
               </div>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Elimina',
        cancelButtonText: 'Annulla',
        reverseButtons: true,
        customClass: {
          confirmButton: 'btn btn-danger',
          cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  </script>
@endsection
