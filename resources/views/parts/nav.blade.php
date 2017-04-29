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

