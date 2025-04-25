@extends('layout')

@section('content')
    <div class="container">
        <!-- Messaggio di benvenuto -->
        <h1>Benvenuto, {{ $user->name }}!</h1>

        <!-- Sezione per i post -->
        <h2>Qui ci sono i tuoi post:</h2>
        @if ($posts->isEmpty())
            <p>Non hai ancora pubblicato nessun post.</p>
        @else
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <small>Pubblicato il {{ $post->created_at->format('d/m/Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection