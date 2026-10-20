@extends('layouts.base')

@section('title', $product -> name)

@section('content')
<h2>{{ $product -> name }} </h2>
ID: {{ $product -> id }}<br>

<a class="text-yellow-700" href="{{ route('products.edit', ['product' => $product])}}">Szerkesztés</a>

<form action="{{ route('products.destroy', ['product' => $product])}}" method="POST">
    @csrf
    @method('DELETE')
    <a class="text-red-700" href="#"
    onclick="event.preventDefault(); this.closest('form').submit();"
    >Törlés</a>
</form>
<br>

<span class="text-lg text-red-500">{{ number_format($product -> price, 0, ",", " ") }} Ft</span><br>
<img src="https://placehold.co/600x400">

Már {{ $orderCount }}-szor megrendelték!

@endsection
