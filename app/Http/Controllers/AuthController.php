<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', 
        ]);

        // Creazione dell'utente
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registrazione completata con successo!');
    }

public function login(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Verifica delle credenziali
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Salva l'utente autenticato nella sessione
            Session::put('user', $user);

            return redirect('/')->with('success', 'Login effettuato con successo!');
        }

        // Credenziali errate
        return back()->withErrors(['email' => 'Credenziali non valide'])->withInput();
    }
}