@extends('layouts.base')

@section('title', "Termékek")

@section('content')

    @if (Session::has('product-created'))
        <div class="w-full bg-green-200 text-center">
            A(z) <b>{{ Session::get('product-created')["name"] }}</b> termék létrehozva!
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="inline-block pb-2 text-green-500">Új termék létrehozása</a>

    <div class="grid grid-cols-3 gap-2 card">
    @foreach ($products as $product)
        <a href="{{ route('products.show', [ 'product' => $product ]) }}">
            <div class="w-full border p-2">
                @if ($product -> image === null)
                    <img src="https://placehold.co/600x400">
                @else
                    <img src="{{ Storage::url("images/" . $product -> image) }}">
                @endif

                {{ $product -> name }}<br>
                <span class="text-lg text-red-500">{{ number_format($product -> price, 0, ",", " ") }} Ft</span>
            </div>
        </a>
    @endforeach
    </div>

    {{ $products -> links() }}
@endsection
