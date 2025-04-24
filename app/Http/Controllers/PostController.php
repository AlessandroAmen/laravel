<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    // Mostra la homepage con i post (GET /)
    public function index()
    {
        // Logica per recuperare i post dal database
        return view('homepage'); // Ritorna una vista chiamata 'homepage'
    }

    // Crea un nuovo post (POST /)
    public function store(Request $request)
    {
        // Logica per salvare un nuovo post nel database
        // Validazione dei dati e salvataggio
        return redirect()->route('homepage')->with('success', 'Post creato con successo!');
    }
}