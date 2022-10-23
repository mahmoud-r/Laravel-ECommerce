

<ul class="menu level1">
    @foreach($categories as $category)
        <li class="item  parent" ><a href="{{route('GetProductByCategory',$category->name)}}" title="{{$category->name}}"><i class="hasicon nov-icon" style="background:url('https://demo.bestprestashoptheme.com/savemart/themes/vinova_savemart/assets/img/modules/novverticalmenu/icon/laptop.png') no-repeat scroll center center;"></i>{{$category->name}}</a><span class="show-sub fa-active-sub"></span><span class="menu-sub-title">{{$category->description}}</span><div class="dropdown-menu" style="width:222px"><ul>

                    @foreach ($category->sub_Categories as $sub)
                        <li class="item " ><a href="{{route('GetProductBySubCategory',$sub->name)}}" title="{{$sub->name}}">{{$sub->name}}</a></li>
                    @endforeach
                </ul></div></li>
    @endforeach
</ul>

