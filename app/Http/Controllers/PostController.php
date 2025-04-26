<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
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
        // Validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Creazione del post
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/')->with('success', 'Post pubblicato con successo!');
    }
}