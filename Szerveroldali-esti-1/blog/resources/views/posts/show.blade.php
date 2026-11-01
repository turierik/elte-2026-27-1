@extends('layouts.blog')

@section('title', $post -> title)

@section('content')

<h2>{{ $post -> title }}</h2>

Szerző: {{ $post -> author -> name}}<br>

@can('update', $post)
    <a class="text-orange-700" href="{{ route('posts.edit', ['post' => $post]) }}">Szerkesztés</a>
@endcan

@can('delete', $post)
    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
        @method("DELETE")
        @csrf
        <a class="text-red-700" href="#"
        onclick="event.preventDefault(); this.closest('form').submit();"
        >Törlés</a>
    </form>
@endcan

<br>

@if ($post -> image !== null)
    <img src="{{ Storage::disk("public") -> url("images/".$post -> image) }}"><br>
@endif

{{ $post -> content }}

@endsection
