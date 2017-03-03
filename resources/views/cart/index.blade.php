@extends('layout')

@section('content')
	@if ($cart->items)
		<table>
			@foreach ($cart->items as $storedItem)
                <tr>
                    <td>{{ $storedItem['item']->name}}</td>
                    <td>{{ $storedItem['item']->price }} zł</td>

					<td>
	                    {{ Form::open(['route' => ['cart.setquantity',$storedItem['item']->id]]) }}
							{{ Form::number('quantity',$storedItem['quantity'],['min' => 1]) }}
							{{ Form::submit('zmień') }}
	                    {{ Form::close() }}
                    </td>
                    
                    <td>
                        {{ Form::open(['route' => ['cart.discard',$storedItem['item']->id]]) }}
                            {{ Form::submit('x') }}
                        {{ Form::close() }}
                    </td> 
                </tr>
            @endforeach
		</table>
	@else
		<span>Brak produktów w koszyku</span>
	@endif
@stop