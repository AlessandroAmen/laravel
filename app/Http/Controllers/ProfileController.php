<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        // Recupera l'utente e i suoi post
        $user = User::with('posts')->find($id);

        if (!$user) {
            return redirect('/')->with('error', 'Utente non trovato');
        }

        return view('profiler', [
            'user' => $user,
            'posts' => $user->posts // Passa i post alla vista
        ]);
    }
}