@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1>Homepage</h1>

    @auth
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Pubblica</button>
        </form>
    @else
        <p><a href="{{ route('login.form') }}">Accedi</a> per pubblicare un post.</p>
    @endauth

    <h2>Lista dei Post</h2>
    <ul>
        @forelse($posts as $post)
            <div class="cardpost">
                <div class="cardcontenuto">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                </div>
                <small>Pubblicato da {{ $post->user->name }} il {{ $post->created_at->format('d/m/Y H:i') }}</small>
            </div>
        @empty
            <p>Non ci sono post da mostrare.</p>
        @endforelse
    </ul>
@endsection