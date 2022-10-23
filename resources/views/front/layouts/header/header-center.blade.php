
<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div id="_desktop_logo" class="d-flex align-items-center justify-content-start col-lg-3 col-md-4">
                <div class="contentsticky_verticalmenu verticalmenu-main" data-textshowmore="Show More" data-textless="Hide" data-desktop_item="4">
                    <div class="toggle-nav d-flex align-items-center justify-content-start">
                        <span class="btnov-lines"></span>
                    </div>
                    <div class="verticalmenu-content">
                        <div id="_desktop_verticalmenu" class="nov-verticalmenu block" data-count_showmore="6">
                            <div class="box-content block_content">
                                <div id="verticalmenu" class="verticalmenu" role="navigation">
                                    {{--                        by ajax--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contentsticky_logo">
                    <a href="{{route('home')}}">
                        <img class="logo img-fluid" src="{{ URL('images/logo/'.setting::get('site_logo')) }}" alt="{{env('APP_NAME')}}">
                    </a>
                </div>

            </div>
            <div class="col-lg-9 col-md-8 header-menu d-flex align-items-center justify-content-between">

                <div id="_desktop_top_menu">
                    <nav id="nov-megamenu" class="clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div id="megamenu" class="nov-megamenu clearfix">
                            <ul class="menu level1">

{{--                                Home--}}
                                <li class="item home-page ">
                                    <a href="{{route('home')}}" title="Home">
                                        <i class="zmdi zmdi-home"></i>
                                        {{__('front.Home')}}
                                    </a>
                                </li>

{{--                                Categories--}}
                                <li class="item  group">
                                    <span class="opener"></span>
                                    <a href="https://demo.bestprestashoptheme.com/savemart/en/2-home" title="Categories">
                                        <i class="zmdi zmdi-group"></i>
                                        {{__('front.Categories')}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="" >
                                            <li class="item container group">
                                                <div class="dropdown-menu" id="category_center">
                                                    {{--                                            by ajax--}}

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    {{--<li class="item container group">--}}
                                    {{--    <div class="dropdown-menu">--}}
                                    {{--        <ul class="">--}}
                                    {{--            <li class="item  html">--}}
                                    {{--                <div class="menu-content">--}}
                                    {{--                    <div class="row">--}}
                                    {{--                        <div class="col-12 col-lg-4 col-md-4 mt-xs-10 text-center"><a href="#"><img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-mega-1.jpg" alt="menu-banner-1"></a></div>--}}
                                    {{--                        <div class="col-4 col-lg-4 col-md-4 mt-xs-10 text-center"><a href="#"><img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-mega-2.jpg" alt="menu-banner-2"></a></div>--}}
                                    {{--                        <div class="col-4 col-lg-4 col-md-4 mt-xs-10 text-center"><a href="#"><img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-mega-3.jpg" alt="menu-banner-3"></a></div>--}}
                                    {{--                    </div>--}}
                                    {{--                </div>--}}
                                    {{--            </li>--}}
                                    {{--        </ul>--}}
                                    {{--    </div>--}}
                                    {{--</li>--}}
                                </li>

{{--                                Contact Us--}}
                                <li class="item ">
                                    <a href="{{route('contactUS')}}" title="contac tUS">
                                        <i class="zmdi zmdi-library"></i>
                                        {{__('front.Contact Us')}}
                                    </a>
                                </li>

{{--                                About Us--}}
                                <li class="item  ">
                                    <a href="{{route('AboutUs')}}" title="About Us">
                                        <i class="zmdi zmdi-assignment"></i>
                                        {{__('front.About Us')}}
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>

{{--                search--}}
                <div class="advencesearch_header">
                    <span class="toggle-search hidden-xl-up"><i class="zmdi zmdi-search"></i></span>
                    <div id="_desktop_search" class="contentsticky_search">
                        <!-- block seach mobile -->
                        <!-- Block search module TOP -->
                        <div id="desktop_search_content">
                            <form method="get" action="{{route('search_result')}}" id="searchbox" class="form-novadvancedsearch">

                                <div class="form-control p-0 " style="border-radius: 23px">
                                    <div class="input-group">
                                            <input type="text" id="search_input" autocomplete="none" class="search_query ui-autocomplete-input form-control" name="search"  placeholder="{{__('front.Search')}}"/>


                                        <span class="input-group-btn">
                                         <button class="btn btn-secondary" type="submit" ><i class="material-icons">search</i></button>
                                    </span>
                                    </div>

                                    <ul class="list_search has-scroll " style="display: none" >


                                    </ul>
                                </div>

                            </form>

                        </div>
                        <!-- /Block search module TOP -->

                    </div>
                </div>

{{--                cart--}}
                <div class="contentsticky_group">
                    <div id="_desktop_cart" >
                        <div class="blockcart cart-preview active"  >
                            <div class="header-cart">
                                <div class="cart-left" >
                                    <div class="shopping-cart"><i class="zmdi zmdi-shopping-cart"></i></div>
                                    <div class="cart-products-count" >
                                        <div class="count" >{{Cart::getTotalQuantity()}}</div>
                                    </div>
                                </div>
                                <div class="cart-right d-flex flex-column align-self-end ml-13">
                                    <span class="title-cart">{{__('front.Cart')}}</span>
                                    <span class="cart-item">{{__('front.items')}}</span>
                                </div>
                            </div>

                            <div class="cart_block has-scroll" id="cart_block" >
                                <div class="cart-block-content" >
                                    <ul class="item-content" >
                                        @forelse(\Cart::getContent() as $item)
                                        <li>
                                            <div class="media" data-item ="{{$item->id}}" >
                                                <img class="d-flex product-image"
                                                     src="{{url('images/product').'/'.$item->attributes->image}}"
                                                     alt="{{$item->name}}"
                                                     title="{{$item->name}}"
                                                >
                                                <div class="media-body">
                                                    <div class="product-name">{{ Str::words($item->name,10) }}</div>
                                                    <div class="group-price">
                                                        <span class="product-price">{{$item->price}}{{__('front.LE')}}</span>
                                                        <span class="quantity"> x {{$item->quantity}}</span>
                                                    </div>
                                                    <a  class="remove-from-cart" rel="nofollow" href="#" data-item-id="{{$item->id}}" title="remove from cart">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        @empty
                                            <div class="no-items">{{__('front.No products in the cart')}}</div>

                                        @endforelse

                                    </ul>
                                    @if(count(\Cart::getContent()) > 0)
{{--                                        <div class="cart-subtotals ">--}}
{{--                                            <div class="products">--}}
{{--                                                <span class="label" > {{__('front.Subtotal')}} : {{\Cart::getSubTotal()}}{{__('front.LE')}}</span>--}}
{{--                                                <span class="value sub-total"></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="shipping">--}}
{{--                                                <span class="label">Shipping:</span>--}}
{{--                                                <span class="value">Free</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="cart-total">
                                            <span class="label">{{__('front.Subtotal')}} : {{\Cart::getSubTotal()}}{{__('front.LE')}}</span>
{{--                                            <span class="value total">{{\Cart::getTotal()}}  LE</span>--}}
                                        </div>
                                        <div class="cart-buttons d-flex">
                                            <a href="{{route('cart')}}" class="btn btn-primary">{{__('front.View cart')}}</a>
                                            <a href="{{route('order')}}" class="btn btn-primary">{{__('front.Checkout')}}</a>
                                        </div>
                                    @endif
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
