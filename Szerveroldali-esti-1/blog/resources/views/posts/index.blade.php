@extends('layouts.blog')

@section('title', 'Kezdőlap')

@section('content')
    <h2>Összes bejegyzés</h2>
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
