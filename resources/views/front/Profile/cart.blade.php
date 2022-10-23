@section('style')
    <style>
        input[name="quantity"] {
            background-color: #fff;
            height: 30px;
            width: 35px;
            font-size: 1.4rem;
            border-radius: 3px 0 0 3px;
            border-color: #dfdfdf;
            text-align: center;
            color: #000;
            padding: .175rem 1rem;
        }
    </style>
@endsection

@section('title')
        {{__('front.Cart')}}
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
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')
    <h1 class="page-title"> {{__('front.Cart')}}</h1>
    <div id="cart">
        <div class="cart-grid row" id="cart">


            <!-- Left Block: cart product informations & shpping -->
            <div class="cart-grid-body col-xs-12 col-lg-9">

                <!-- cart products detailed -->
                <div class="cart-container">


                    <div class="cart-overview js-cart">

                        <div class="alert alert-danger remove-cart-alert   alert-dismissible fade show"
                             style="display: none" role="alert">
                            {{__('front.PRODUCT SUCCESSFULLY DELETED')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger  out-of-stock-alert  alert-dismissible fade show"
                             style="display: none" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="alert alert-success   alert-dismissible fade show" style="display: none"
                             role="alert">
                            {{__('front.PRODUCT SUCCESSFULLY DELETED')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <ul class="cart-items">

                            @forelse(\Cart::getContent() as $item)

                                <li class="cart-item " data-item="{{$item->id}}">

                                    <div class="product-line-grid row spacing-10">
                                        <!--  product left content: image-->
                                        <div class="product-line-grid-left col-sm-2 col-xs-4">
                                        <span class="product-image media-middle">
                                          <img class="img-fluid"
                                               src="{{url('images/product').'cart.blade.php/'.$item->attributes->image}}"
                                               alt="{{$item->name}}">
                                        </span>
                                        </div>

                                        <!--  product left body: description -->
                                        <div class="product-line-grid-body col-sm-10 col-xs-8">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="product-line-info">
                                                        <a class="label"
                                                           href="{{route('product',$item->id)}}"
                                                           data-id_customization="0">{{ Str::words($item->name,20) }}</a>
                                                    </div>

                                                    <div class="product-line-info product-price">
                                                        <span class="value">{{$item->price}}{{__('front.LE')}}</span>
                                                    </div>


                                                </div>
                                                <div class="text-center product-line-actions col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-9 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6 qty">
                                                                    <div class="label">{{__('front.Qty:')}}</div>
                                                                    <input
                                                                        id="quantity{{$item->id}}"
                                                                        class="quantity_update"
                                                                        data-item-id="{{$item->id}}"
                                                                        type="text"
                                                                        value="{{$item->quantity}}"
                                                                        name="quantity"
                                                                        min="1"
                                                                        max="100"
                                                                    />
                                                                </div>
                                                                <div class="col-md-6 col-xs-6 price">
                                                                    <div class="label">{{((__('front.Total')))}}</div>
                                                                    <div class="product-price total{{$item->id}}">
                                                                        {{Cart::get($item->id)->getPriceSum()}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-12 text-xs-right align-self-end">
                                                            <div class="cart-line-product-actions ">
                                                                <a
                                                                    class="remove-from-cart"
                                                                    rel="nofollow"
                                                                    href="#"
                                                                    data-item-id="{{$item->id}}"
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
                                <p class="alert alert-warning">{{__('front.No products in the cart')}}</p>
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
            <div class="cart-grid-right col-xs-12 col-lg-3">


                <div class="cart-summary">


                    <div class="cart-detailed-totals">
                        <div class="cart-summary-products">
                            <div class="summary-label countInCart">{{__('front.There are')}} {{Cart::getTotalQuantity()}}{{__('front. item in your cart.')}}
                            </div>
                        </div>

                        <div class="">
                            <div class="cart-summary-line" id="cart-subtotal-products">
          <span class="label js-subtotal">
                          {{__('front.Total products:')}}
                      </span>
                                <span class="value sub-total">{{\Cart::getSubTotal()}}{{__('front.LE')}}</span>
                            </div>
                            <div class="cart-summary-line" id="cart-subtotal-shipping">
                               <span class="label">
                          {{__('front.Shipping:')}}
                      </span>
                                <span class="value">{{__('front.Free')}}</span>
                                <div><small class="value"></small></div>
                            </div>
                        </div>


                        <div class="">
                            <div class="cart-summary-line cart-total">
                                <span class="label ">{{__('front.Total:')}}</span>
                                <span class="value total">{{\Cart::getTotal()}}{{__('front.LE')}}</span>
                            </div>

                        </div>

                    </div>


                    <div class="checkout cart-detailed-actions">
                        <div class="text-xs-center">
                            <a href="{{route('order')}}" class="btn btn-primary">{{__('front.Checkout')}}</a>

                        </div>
                    </div>


                </div>


{{--                <div class="blockreassurance_product">--}}
{{--                    <div>--}}
{{--            <span class="item-product">--}}
{{--                                                        <img class="svg invisible"--}}
{{--                                                             src="/savemart/modules/blockreassurance/img/ic_verified_user_black_36dp_1x.png">--}}
{{--                                    &nbsp;--}}
{{--            </span>--}}
{{--                        <p class="block-title" style="color:#000000;">Security policy (edit with Customer reassurance--}}
{{--                            module)</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--            <span class="item-product">--}}
{{--                                                        <img class="svg invisible"--}}
{{--                                                             src="/savemart/modules/blockreassurance/img/ic_local_shipping_black_36dp_1x.png">--}}
{{--                                    &nbsp;--}}
{{--            </span>--}}
{{--                        <p class="block-title" style="color:#000000;">Delivery policy (edit with Customer reassurance--}}
{{--                            module)</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--            <span class="item-product">--}}
{{--                                                        <img class="svg invisible"--}}
{{--                                                             src="/savemart/modules/blockreassurance/img/ic_swap_horiz_black_36dp_1x.png">--}}
{{--                                    &nbsp;--}}
{{--            </span>--}}
{{--                        <p class="block-title" style="color:#000000;">Return policy (edit with Customer reassurance--}}
{{--                            module)</p>--}}
{{--                    </div>--}}
{{--                    <div class="clearfix"></div>--}}
{{--                </div>--}}


            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection


@include('front.master')
