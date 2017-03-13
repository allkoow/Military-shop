 <div class="menu-item menu-item-basket">
    
    <i class="icon-basket"></i>
    
    <a href="{{route('cart')}}">Koszyk</a>
    
    <div class="bookmark bookmark-cart">
        @if($cart)
            
            <table>
            @foreach ($cart->items as $item)
                <tr>
                    <td> <a href="{{ route('products.show', ['product' => $item['name']]) }}"> {{ $item['name']}} </a> </td>

                    @if( $item['size'] != 'nie dotyczy')
                        <td> {{ $item['size'] }}</td>
                    @else
                        <td></td>
                    @endif

                    <td>({{ $item['quantity'] }})</td>
                    <td>{{ $item['totalPrice'] }} zł</td>
                    <td>
                        {{ Form::open(['route' => ['cart.discard',$item['id']]]) }}
                            {{ Form::hidden('size',$item['size']) }}
                            <input type="submit" value="&#xf1f8;" class="icons cart-trash"/>
                        {{ Form::close() }}
                    </td> 
                </tr>
            @endforeach
            </table>
        
        @else
            <span>brak produktów w koszyku</span>
        @endif
        
        @if($cart)
            <a href="{{route('cart.pull')}}">OPRÓŻNIJ</a>
        @endif

    </div>
</div>