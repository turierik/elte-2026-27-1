@extends('layouts.blog')

@section('title', 'Kezdőlap')

@section('content')
    <h2>Összes bejegyzés</h2>
    <ul>
    @foreach ($posts as $post)
        <li>{{ $post -> title }}</li>
    @endforeach
    </ul>
@endsection
