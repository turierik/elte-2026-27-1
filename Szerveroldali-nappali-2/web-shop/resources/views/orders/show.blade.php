@extends('layouts.base')

@section('title', "Rendelés")

@section('content')
    <ul>
    @foreach($order -> products() -> get() as $product)
        <li>{{ $product -> name}} - {{ number_format($product -> price, 0, ",", " ") }} Ft -
        <form class="inline-block" action="{{ route('orders.removeProduct', ['order' => $order, 'product' => $product]) }}" method="POST">
            @csrf
            @method("DELETE")
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Törlés</a></li>
        </form>
    @endforeach
    </ul>

    <form action="{{ route('orders.addProduct', ['order' => $order])}}" method="POST">
        <select name="product_id">
            @foreach($unassignedProducts as $product)
                <option value="{{ $product -> id}}">{{ $product -> name}}</option>
            @endforeach
        </select>
        <button>Hozzáadás</button>
    </form>
@endsection
