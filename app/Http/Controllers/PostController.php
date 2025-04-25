<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    // Mostra la homepage con i post
    public function index()
    {
        // Recupera tutti i post con i dati dell'utente associato
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('homepage', compact('posts'));
    }

    // Salva un nuovo post
    public function store(Request $request)
    {
        // Controlla che l'utente sia loggato
        if (!Session::has('user')) {
            return redirect('/login')->with('error', 'Devi essere loggato per pubblicare un post.');
        }

        // Validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Creazione del post
        Post::create([
            'user_id' => Session::get('user')->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/')->with('success', 'Post pubblicato con successo!');
    }
}