 <div class="menu-item menu-item-basket">
        <i class="icon-basket"></i>
        <a href="{{route('cart')}}">Koszyk</a>
        <div class="bookmark">
            @if($cart)
                <table>
                @foreach ($cart->items as $storedItem)
                    <tr>
                        <td>{{ $storedItem['item']->name}}</td>

                        @if( $storedItem['size'] != 'nie dotyczy')
                            <td> {{ $storedItem['size'] }}</td>
                        @endif
                        
                        <td>({{ $storedItem['quantity'] }})</td>
                        <td>{{ $storedItem['price'] }}</td>
                        <td>
                            {{ Form::open(['route' => ['cart.discard',$storedItem['item']->id]]) }}
                                {{ Form::submit('x') }}
                            {{ Form::close() }}
                        </td> 
                    </tr>
                @endforeach
                </table>
            @else
                <span>brak produktów w koszyku</span>
            @endif
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