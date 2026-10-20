@extends('layouts.base')

@section('title', "{$product -> name} szerkesztése")

@section('content')
    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        Termék neve:
        <input type="text" name="name" value="{{ old('name', $product -> name) }}">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        Termék ára:
        <input type="text" name="price" value="{{ old('price', $product -> price )}}">
        @error('price')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        Kép:
        <input type="file" name="image_file"><br>
        @error('image_file')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit">Mentés</button>
    </form>
@endsection
