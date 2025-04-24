@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1 class="mb-4">Homepage</h1>

    <h2>Lista dei Post</h2>
    <ul>
        {{-- Qui verranno mostrati i post (da implementare con il database) --}}
        <li>Post 1</li>
        <li>Post 2</li>
    </ul>

    <h2 class="mt-4">Crea un nuovo post</h2>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crea Post</button>
    </form>
@endsection