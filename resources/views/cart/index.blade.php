@extends('layout')

@section('content')
    @if($cart)
        <tr>
            <td>Nazwa</td>
            <td>Cena za szt.</td>
            <td>Liczba sztuk</td>
            <td>Cena</td>
        </tr>

        <table>
        @foreach ($cart->items as $item)
            <tr>
                <td>{{ $item['name']}}</td>

                @if( $item['size'] != 'nie dotyczy')
                    <td> {{ $item['size'] }}</td>
                @endif
                
                <td>{{ $item['price'] }}</td>
                
                <td>
                    {{ Form::open(['route' => ['cart.setquantity', $item['id']]]) }}
                        {{ Form::hidden('size', $item['size']) }}
                        {{ Form::number('quantity',$item['quantity'],['min' => 1]) }}
                        {{ Form::submit('zmień') }}
                    {{ Form::close() }}
                </td>
                
                <td>{{ $item['totalPrice'] }}</td>
                <td>
                    {{ Form::open(['route' => ['cart.discard',$item['id']]]) }}
                        {{ Form::hidden('size',$item['size']) }}
                        {{ Form::submit('x') }}
                    {{ Form::close() }}
                </td> 
            </tr>
        @endforeach
        </table>
    @else
        <span>brak produktów w koszyku</span>
    @endif
@stop