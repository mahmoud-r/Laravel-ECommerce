@section('style')

@endsection

@section('title')
    {{__('front.My Wishlist')}}
@endsection

@section('description')

@endsection
@section('nav')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">{{__('front.Home')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('wishlist.index')}}">
                            <span itemprop="name">{{__('front.My Wishlist')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')
    <h1 class="page-title">{{__('front.My Wishlist')}}</h1>
    <div id="cart">
        <div class="cart-grid row" id="cart">


            <!-- Left Block: cart product informations & shpping -->
            <div class="cart-grid-body col-xs-12 col-lg-9">

                <!-- cart products detailed -->
                <div class="cart-container">


                    <div class="cart-overview js-cart">

                        <div class="alert alert-danger remove-wishlist-alert   alert-dismissible fade show" style="display: none" role="alert">
                            {{__('front.PRODUCT SUCCESSFULLY DELETED')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger  out-of-stock-alert  alert-dismissible fade show" style="display: none" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         <div class="alert alert-success   alert-dismissible fade show" style="display: none" role="alert">
                             {{__('front.PRODUCT SUCCESSFULLY DELETED')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <ul class="cart-items">

                                @forelse($wishlists as $item)

                                <li class="cart-item " data-item ="{{$item->products->id}}">

                                    <div class="product-line-grid row spacing-10 align-items-center">
                                        <!--  product left content: image-->
                                        <div class="product-line-grid-left col-sm-2 col-xs-4 ">
                                        <span class="product-image media-middle">
                                          <img class="img-fluid"
                                               src="{{url('images/product').'/'.$item->products->images[0]->name}}"
                                               alt="{{$item->products->name}}">
                                        </span>
                                        </div>

                                        <!--  product left body: description -->
                                        <div class="product-line-grid-body col-sm-10 col-xs-8">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="product-line-info">
                                                        <a class="label"
                                                           href="{{route('product',$item->products->id)}}"
                                                           data-id_customization="0">{{$item->products->name}}</a>
                                                    </div>
                                                </div>
                                                <div class="text-center product-line-actions col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-9 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6 qty">
                                                                    <form action="{{route('cart.add')}}" method="post" class=" addCart">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id" value="{{$item->products->id}}">
                                                                        <input type="hidden" name="Quantity" value="1">
                                                                        <button type="submit" class="add-to-cart" style="border: none;cursor: pointer;color: #2d9ae8;font-weight: bold;" href="#">
                                                                            <i class="novicon-cart"></i>
                                                                            <span>{{__('front.Add to cart')}}</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6 price">
                                                                    <div class="label">{{__('front.price')}}</div>
                                                                    <div class="product-price total{{$item->id}}">
                                                                        £{{$item->products->price}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-12 text-xs-right align-self-end">
                                                            <div class="cart-line-product-actions ">
                                                                <a
                                                                    class="remove-from-wishlist"
                                                                    rel="nofollow"
                                                                    href="#"
                                                                    data-item-id="{{$item->products->id}}"
                                                                >
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            @empty
                                <p class="alert alert-warning">{{__('front.No products in the wishlist')}}</p>
                            @endforelse
                        </ul>
                    </div>


                </div>


                <a class="label btn btn-primary" href="{{route('home')}}">
                    {{__('front.Continue shopping')}}
                </a>


                <!-- shipping informations -->


            </div>

            <!-- Right Block: cart subtotal & cart total -->
            <div class="cart-grid-right col-xs-12 col-lg-3 pt-0">


                <div class="nov-productlist     productlist-liststyle-3  col-xl-12 col-lg-12 col-md-12 col-xs-12 no-padding pt-0">
                    <div class="block block-product clearfix">
                        <h2 class="title_block">
                            {{__('front.Featured')}}
                        </h2>
                        <div class="block_content">
                            <div id="productlist127205293"
                                 class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false"
                                 data-autoplayTimeout="6000" data-loop="false" data-margin="0" data-dots="false"
                                 data-nav="true" data-items="1" data-items_large="1" data-items_tablet="1"
                                 data-items_mobile="1">
                                @if(count($featured_categore) > 0)
                                    <div class="item  text-center">
                                        @foreach($featured_categore as $item)
                                            @if($loop->index < 3)

                                                <div
                                                    class="d-flex flex-wrap align-items-start product-miniature js-product-miniature  first_item"
                                                    data-id-product="1" data-id-product-attribute="40" itemscope
                                                    itemtype="http://schema.org/Product">
                                                    <div class="col-12 col-w37 no-padding">
                                                        <div class="thumbnail-container">

                                                            <a href="{{route('product',$item->id)}}"
                                                               class="thumbnail product-thumbnail two-image">
                                                                <img
                                                                    class="img-fluid image-cover"
                                                                    src="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                    alt=""
                                                                    data-full-size-image-url="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                    width="600"
                                                                    height="600"
                                                                >
                                                                @if(!empty($product->$item[1]->name))
                                                                    <img
                                                                        class="img-fluid image-secondary"
                                                                        src="{{url('images/product').'/'.$product->images[1]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[1]->name}}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                @else
                                                                    <img
                                                                        class="img-fluid image-secondary"
                                                                        src="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-w63 no-padding">
                                                        <div class="product-description">
                                                            <div class="product-groups">
                                                                <div class="product-comments">
                                                                    <div class="star_content">
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 1 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 2 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 3 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 4 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 5 ? 'star_on' : ''}}"></div>
                                                                    </div>
                                                                    <span>5 review</span>
                                                                </div>

                                                                <div class="product-title" itemprop="name"><a
                                                                        href="{{route('product',$item->id)}}">
                                                                        {{Str::words($item->name,10)}}
                                                                    </a></div>
                                                                <div class="product-group-price">

                                                                    <div class="product-price-and-shipping">

                                                                        <span itemprop="price" class="price">{{$item->price}}{{__('front.LE')}}</span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                @if(count($featured_categore) > 3)
                                    <div class="item  text-center">
                                        @foreach($featured_categore as $item)
                                            @if($loop->index >= 3 && $loop->index <6)

                                                <div
                                                    class="d-flex flex-wrap align-items-start product-miniature js-product-miniature  first_item"
                                                    data-id-product="1" data-id-product-attribute="40" itemscope
                                                    itemtype="http://schema.org/Product">
                                                    <div class="col-12 col-w37 no-padding">
                                                        <div class="thumbnail-container">

                                                            <a href="{{route('product',$item->id)}}"
                                                               class="thumbnail product-thumbnail two-image">
                                                                <img
                                                                    class="img-fluid image-cover"
                                                                    src="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                    alt=""
                                                                    data-full-size-image-url="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                    width="600"
                                                                    height="600"
                                                                >
                                                                @if(!empty($product->$item[1]->name))
                                                                    <img
                                                                        class="img-fluid image-secondary"
                                                                        src="{{url('images/product').'/'.$product->images[1]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[1]->name}}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                @else
                                                                    <img
                                                                        class="img-fluid image-secondary"
                                                                        src="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$item->images[0]->name}}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-w63 no-padding">
                                                        <div class="product-description">
                                                            <div class="product-groups">
                                                                <div class="product-comments">
                                                                    <div class="star_content">
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 1 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 2 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 3 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 4 ? 'star_on' : ''}}"></div>
                                                                        <div
                                                                            class="star {{$item->reviews->avg('review') >= 5 ? 'star_on' : ''}}"></div>
                                                                    </div>
                                                                    <span>5 review</span>
                                                                </div>

                                                                <div class="product-title" itemprop="name"><a
                                                                        href="{{route('product',$item->id)}}">
                                                                        {{Str::words($item->name,10)}}
                                                                    </a></div>
                                                                <div class="product-group-price">

                                                                    <div class="product-price-and-shipping">

                                                                        <span itemprop="price" class="price">{{$item->price}}{{__('front.LE')}}</span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
<script>

</script>
@endsection


@include('front.master')
