
<ul class="">
    @foreach($categories as $category)
        <li class="item col-lg-3 col-md-3 html">
            <span class="menu-title">{{$category->name}}</span>
            <div class="menu-content">
                <ul class="col">
                    @foreach($category->sub_Categories as $item)
                        <li><a href="{{route('GetProductBySubCategory',$item->name)}}" title="{{$item->name}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>


