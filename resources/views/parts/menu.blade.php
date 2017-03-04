 <div class="menu-item menu-item-basket">
        <i class="icon-basket"></i>
        <a href="{{route('cart')}}">Koszyk</a>
        <div class="bookmark">
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
            <a href="{{route('cart.pull')}}">Opróżnij</a>
        </div>
    </div>
    
    <div class="menu-item menu-item-nav-mini">
        <div id="nav-mini-icon" >
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <nav>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a class='link-default link-color-bright' href="/../products/?category={{$category->id}}"> {{$category->name}} </a>
                    <ol class="subcat">
                    @foreach($category['subcategories'] as $sub)
                        <li> <a class='link-default link-color-bright' href="/../products/?subcategory={{$sub->id}}">{{$sub->name}} </a></li>
                    @endforeach
                    </ol>
                </li>
            @endforeach
        </ul>
    </nav>
</div>