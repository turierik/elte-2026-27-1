@extends('layouts.blog')

@section('title', 'Kezdőlap')

@section('content')
    <h2>Összes bejegyzés</h2>

    @if (Session::has('post-created'))
        <div class="bg-green-200 p-2 text-center rounded">
            A(z) <b>{{ Session::get('post-created')["title"] }}</b> című bejegyzés létrehozva!
        </div>
    @endif

    @can('create', \App\Models\Post::class)
        <a class="text-fuchsia-700" href="{{ route('posts.create') }}">Új bejegyzés írása</a>
    @endcan

    <ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route("posts.show", ["post" => $post]) }}">
                {{ $post -> title }} ({{ $post -> author -> name }})
            </a>
        </li>
    @endforeach
    </ul>
    {{ $posts -> links() }}
@endsection
