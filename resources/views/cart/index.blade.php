@extends('layout')

@section('content')
    @if(Cart::count())
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

            @foreach(Cart::content() as $item)
                <tr>
                    <td>
                        <span>{{ $item->name}}</span>
                        {{-- <span>{{ $item->model->sizes->find($item->options->size)->name }}</span> --}}
                    </td>

                    <td>{{ $item->price }} zł</td>
                    
                    <td>
                        {{ Form::open(['route' => ['cart.update', $item->rowId], 'method' => 'PUT']) }}
                            {{ Form::number('quantity',$item->qty,['min' => 1, 'class' => 'text-cart']) }}
                            {{ Form::submit('zmień',['class' => 'button-cart']) }}
                        {{ Form::close() }}
                    </td>
                    
                    <td>{{ $item->subtotal }} zł</td>
                    <td>
                        {{ Form::open(['route' => ['cart.destroy', $item->rowId], 'method' => 'DELETE']) }}
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