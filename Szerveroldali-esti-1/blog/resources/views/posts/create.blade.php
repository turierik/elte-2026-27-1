@extends('layouts.blog')

@section('title', 'Új bejegyzés írása')

@section('content')

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        Cím:<br>
        <input type="text" name="title"
        value="{{ old('title', '')}}"
        > <br>
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        Tartalom:<br>
        <textarea name="content">{{ old('content', '')}}</textarea>
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror<br>

        {{-- Szerző:<br>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user -> id}}">
                    {{ $user -> name }}
                </option>
            @endforeach
        </select>
        <br>
        @error('user_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br> --}}

        Kép:
        <input type="file" name="image_file"><br>
        @error('image_file')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <br>
        <button type="submit">Mentés</button>
    </form>

@endsection
