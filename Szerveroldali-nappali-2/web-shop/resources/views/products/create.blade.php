@extends('layouts.base')

@section('title', 'Új termék')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        Termék neve:
        <input type="text" name="name" value="{{ old('name', '') }}">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        Termék ára:
        <input type="text" name="price" value="{{ old('price', '' )}}">
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
