@extends('layout')

@section('content')
            @if($cart)
                <table>
                @foreach ($cart->items as $item)
                    <tr>
                        <td>{{ $item['name']}}</td>

                        @if( $item['size'] != 'nie dotyczy')
                            <td> {{ $item['size'] }}</td>
                        @endif

                        <td>({{ $item['quantity'] }})</td>
                        <td>{{ $item['totalPrice'] }}</td>
                        <td>
                            {{ Form::open(['route' => ['cart.discard',$item['id']]]) }}
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