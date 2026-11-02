@extends('layouts.base')

@section('title', "Rendeléseim")

@section('content')
    @forelse($orders as $order)
        @if ($loop -> first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Időpont</th>
                    <th>Státusz</th>
                    <th>Termékek</th>
                    <th></th>
                </tr>
        @endif
        <tr>
            <td>{{$order -> id}}</td>
            <td>{{$order -> created_at}}</td>
            <td>{{$order -> status}}</td>
            <td>{{number_format($order -> products -> sum('price'), 0, ",", " ") }} Ft</td>
            <td><a href="{{ route('orders.show', ['order' => $order] )}}">Megtekint</a></td>
        </tr>
        @if ($loop -> last)
            </table>
        @endif
    @empty
        Neked nincsenek még rendeléseid.
    @endforelse
@endsection
