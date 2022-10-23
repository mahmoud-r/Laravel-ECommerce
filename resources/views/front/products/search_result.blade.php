@section('style')

@endsection

@section('title')
    {{$name}}
@endsection

@section('description')

@endsection
@section('nav')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{url('/')}}">
                            <span itemprop="name">{{__('front.Home')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    @if($name)
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="#">
                            <span itemprop="name">

                                        {{$name}}

                            </span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                    @endif
                </ol>

            </div>
        </div>
    </nav>

@endsection

@section('content')

    <div class="row">
        @include('front.products.fillterBySearch')
        <section id="products" class="left-column col-xs-12 col-sm-8 col-md-10 flex-xs-first">
            <h6 class="page-title">{{$name}}</h6>

            <div id="nav-top">

                <div id="js-product-list-top" class="row products-selection">
                    <div class="col-md-6 col-xs-6">
                        <div class="change-type">
                            <span class="grid-type active" data-view-type="grid"><i class="fa fa-th-large"></i></span>
                            <span class="list-type" data-view-type="list"><i class="fa fa-bars"></i></span>
                        </div>
                        <div class="hidden-sm-down total-products">
                            <p>{{__('front.There are')}} {!! $products->perPage()!!} {{__('front.products.')}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="d-flex sort-by-row justify-content-end">

                            <span class="hidden-sm-down sort-by">{{__('front.Sort by:')}}</span>
                            <div class="products-sort-order dropdown">
                                <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span>{{__('front.Sort by:')}}</span>
                                    <i class="material-icons pull-xs-right">&#xE5C5;</i>
                                </a>
                                <div class="dropdown-menu">

                                    <a
                                        rel="nofollow"
                                        href="{{route('search_result',['search='.$name,'sort=name_asc'])}}"
                                        class="select-list  sort_by"
                                    >
                                        {{__('front.Name, A to Z')}}

                                    </a>
                                    <a
                                        rel="nofollow"
                                        href="{{route('search_result',['search='.$name,'sort=name_desc'])}}"
                                        class="select-list  sort_by"
                                    >
                                        {{__('front.Name, Z to A')}}
                                    </a>
                                    <a

                                        href="{{route('search_result',['search='.$name,'sort=price_asc'])}}"
                                        class="select-list sort_by"
                                    >
                                        {{__('front.Price, low to high')}}
                                    </a>
                                    <a
                                        rel="nofollow"
                                        href="{{route('search_result',['search='.$name,'sort=price_desc'])}}"
                                        class="select-list  sort_by"
                                    >
                                        {{__('front.Price, high to low')}}
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div id="data">
                <div id="categories-product">

                    <div id="js-product-list">
                        <div class="products product_list grid row" data-default-view="grid">


                            @forelse($products as $product)
                                <div class="item  col-lg-3 col-md-6 col-xs-12 text-center no-padding">
                                    <div class="product-miniature js-product-miniature item-one" data-id-product="3"
                                         data-id-product-attribute="95" itemscope itemtype="http://schema.org/Product">

                                        <div class="thumbnail-container">
                                            <a href="{{route('product',$product->id)}}"
                                               class="thumbnail product-thumbnail two-image">
                                                <img
                                                    class="img-fluid image-cover"
                                                    src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                    alt=""
                                                    data-full-size-image-url="https://demo.bestprestashoptheme.com/savemart/34-large_default/the-best-is-yet-to-come-framed-poster.jpg"
                                                    width="600"
                                                    height="600"
                                                >
                                                @if(!empty($product->images[1]))
                                                    <img
                                                        class="img-fluid image-secondary"
                                                        src="{{url('images/product').'/'.$product->images[1]->name}}"
                                                        alt=""
                                                        width="600"
                                                        height="600"
                                                    >
                                                @else
                                                    <img
                                                        class="img-fluid image-secondary"
                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                        alt=""
                                                        width="600"
                                                        height="600"
                                                    >
                                                @endif

                                            </a>
                                            @if(!empty($product->old_price))
                                                <div class="product-flags discount">-{{round((($product->old_price-$product->price)/$product->old_price)*100) }}%</div>
                                            @endif
                                            {{--                                    <div class="product-flags new">New</div>--}}

                                        </div>

                                        <div class="product-description">
                                            <div class="product-groups">

                                                <div class="category-title"><a
                                                        href="https://demo.bestprestashoptheme.com/savemart/en/smartphone-tablet/3-the-best-is-yet-to-come-framed-poster.html">Smartphone
                                                        & ampamp; Tablet</a></div>

                                                <div class="group-reviews">
                                                    <div class="product-comments">
                                                        <div class="star_content">
                                                            <div class="star {{$product->reviews->avg('review') >= 1 ? 'star_on' : ''}}"></div>
                                                            <div class="star {{$product->reviews->avg('review') >= 2 ? 'star_on' : ''}}"></div>
                                                            <div class="star {{$product->reviews->avg('review') >= 3 ? 'star_on' : ''}}"></div>
                                                            <div class="star {{$product->reviews->avg('review') >= 4 ? 'star_on' : ''}}"></div>
                                                            <div class="star {{$product->reviews->avg('review') >= 5 ? 'star_on' : ''}}"></div>
                                                        </div>
                                                        <span>5 review</span>
                                                    </div>

                                                    <div class="info-stock ml-auto">
                                                        @if($product->quantity >= 1)
                                                            <label class="control-label">{{__('front.Availability:')}}</label>
                                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                            {{__('front.in stock')}}
                                                        @else
                                                            <label class="control-label">{{__('front.Availability:')}}</label>
                                                            <p style="color: red">{{__('front.out of stock')}}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="product-title" itemprop="name"><a
                                                        href="{{route('product',$product->id)}}">{{$product->name}}</a>
                                                </div>

                                                <div class="product-group-price">

                                                    <div class="product-price-and-shipping">


                                                        <span itemprop="price" class="price">{{$product->price}}E</span>


                                                    </div>

                                                </div>
                                                <div class="product-desc" itemprop="desciption">
                                                    {{$product->short_description}}
                                                </div>
                                            </div>
                                            <div class="product-buttons d-flex justify-content-center" itemprop="offers"
                                                 itemscope itemtype="http://schema.org/Offer">
                                                <form action="{{route('cart.add')}}" method="post" class=" addCart">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <input type="hidden" name="Quantity" value="1">
                                                    <button type="submit" class="add-to-cart"
                                                            style="border: none;cursor: pointer" href="#"><i
                                                            class="novicon-cart"></i><span>Add to cart</span></button>
                                                </form>

                                                <a class="addToWishlist wishlistProd_4" href="#" data-product-id="{{$product->id}}">
                                                    <i class="fa fa-heart"></i>
                                                    <span>Add to Wishlist</span>
                                                </a>

                                                <a href="#" class="quick-product add-to-cart hidden-sm-down"
                                                   data-product-id="{{$product->id}}">
                                                    <i class="fa fa-search"></i><span> Quick view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <p>The products you are search empty</p>
                            @endforelse

                        </div>
                    </div>

                </div>

            </div>
            <div id="js-product-list-bottom">

                {{ $products->withQueryString()->links(('vendor.pagination.custom')) }}

            </div>

        </section>

    </div>

@endsection





@include('front.master')
