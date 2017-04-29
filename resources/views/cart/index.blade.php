@extends('layout')

@section('content')
    @if($cart)
    <div class="subpanel-container">
        @if (Session::has('error'))
            <div class="information-panel error-panel">
                {{ Session::get('error') }}
            </div>
        @endif
        <h1>Lista produktów</h1>
        <table class="table-default">
            <tr>
                <th>Nazwa</th>
                <th>Cena za szt.</th>
                <th>Liczba sztuk</th>
                <th>Cena</th>
                <th></th>
            </tr>

            @foreach ($cart->items as $item)
                <tr>
                    <td>
                        {{ $item['name']}}

                        @if( $item['size'] != 'nie dotyczy')
                            {{ $item['size'] }}
                        @endif
                    
                    </td>

                    <td>{{ $item['price'] }}</td>
                    
                    <td>
                        {{ Form::open(['route' => ['cart.setquantity', $item['id']]]) }}
                            {{ Form::hidden('size', $item['size']) }}
                            {{ Form::number('quantity',$item['quantity'],['min' => 1, 'class' => 'text-cart']) }}
                            {{ Form::submit('zmień',['class' => 'button-cart']) }}
                        {{ Form::close() }}
                    </td>
                    
                    <td>{{ $item['totalPrice'] }}</td>
                    <td>
                        {{ Form::open(['route' => ['cart.discard',$item['id']]]) }}
                            {{ Form::hidden('size',$item['size']) }}
                            <input type="submit" value="&#xf1f8;" class="icons cart-trash"/>
                        {{ Form::close() }}
                    </td> 
                </tr>
            @endforeach
            </table>
        </div>
        <div class="subpanel-container">
            <h1>Złóż zamówienie</h1>
            <div class="row row-left-align">
                <a href="{{ URL::route('order.create') }}">
                    <button class='button-default'>Zamów</button>
                </a>
            </div>
        </div>
    @else
        <span>brak produktów w koszyku</span>
    @endif
@stop