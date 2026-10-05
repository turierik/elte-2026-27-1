@extends('layouts.base')

@section('title', "Termékek")

@section('content')
    <div class="grid grid-cols-3 gap-2">
    @foreach ($products as $product)
        <div class="w-full border p-2">
            <img src="https://placehold.co/600x400">
            {{ $product -> name }}<br>
            <span class="text-lg text-red-500">{{ number_format($product -> price, 0, ",", " ") }} Ft</span>
        </div>
    @endforeach
    </div>
@endsection
