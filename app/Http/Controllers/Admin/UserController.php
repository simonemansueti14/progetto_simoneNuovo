<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountEliminatoMail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $users = \App\Models\User::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'q'));
}

    public function destroy(User $user)
    {
        if ($user->role === User::ROLE_ADMIN) {
            return back()->with('error', 'Non puoi eliminare un admin.');
        }

        // invia email PRIMA di cancellare (così hai ancora i dati nel mailable)
        if ($user->email) {
            Mail::to($user->email)->send(new AccountEliminatoMail($user));
        }

        $user->delete();

        return back()->with(
            'success',
            'Utente eliminato con successo.' . ($user->email ? ' È stata inviata una email di notifica.' : '')
        );
    }
}
