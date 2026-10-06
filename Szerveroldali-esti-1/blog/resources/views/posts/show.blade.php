@extends('layouts.blog')

@section('title', $post -> title)

@section('content')

<h2>{{ $post -> title }}</h2>

Szerző: {{ $post -> author -> name}}<br><br>

{{ $post -> content }}

@endsection
