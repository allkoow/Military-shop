 <div class="menu-item menu-item-basket">
        <i class="icon-basket"></i>
        <span>koszyk</span>
        <div class="bookmark">
            @if ($cart)
                <table>
                    @foreach ($cart as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}} zł</td>
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