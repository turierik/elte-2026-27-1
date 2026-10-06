@extends('layouts.base')

@section('title', $product -> name)

@section('content')
<h2>{{ $product -> name }} </h2>
ID: {{ $product -> id }}<br>
<span class="text-lg text-red-500">{{ number_format($product -> price, 0, ",", " ") }} Ft</span><br>
<img src="https://placehold.co/600x400">

Már {{ $orderCount }}-szor megrendelték!

@endsection
