<div class="col-md-3">


    <div class="cart-summary js-cart">

        <div class="cart-summary-products">
            <div class="summary-label">{{__('front.There are')}} {{Cart::getTotalQuantity()}}{{__('front. item in your cart.')}}</div>
            <div class="show-details">
                <a href="#" data-toggle="collapse" data-target="#cart-summary-product-list">
                    {{__('front.show details')}}
                </a>
            </div>

            <div class="collapse" id="cart-summary-product-list">
                <ul class="media-list">

                    @forelse(\Cart::getContent() as $item)
                        <li class="media">
                            <div class="media-left d-flex align-self-start">
                                <a href="{{route('product',$item->id)}}"
                                   title="{{$item->name}}">
                                    <img class="media-object"
                                         src="{{url('images/product').'/'.$item->attributes->image}}"
                                         alt="{{$item->name}}">
                                </a>
                            </div>
                            <div class="media-body d-flex flex-column">
                                <span class="product-name">{{ Str::words($item->name,5) }}</span>
                                <span class="product-quantity">x {{$item->quantity}}</span>
                                <span class="product-price pull-xs-right">{{$item->price}}{{__('front.LE')}}</span>

                            </div>

                        </li>
                    @empty
                        <p class="alert alert-warning">{{__('front.No products in the cart')}}</p>
                    @endforelse

                </ul>
            </div>

        </div>


        <div class="cart-summary-line" id="cart-subtotal-products">
                              <span class="label js-subtotal">
                          {{__('front.Total products:')}}
                      </span>
            <span class="value">{{\Cart::getSubTotal()}}{{__('front.LE')}}</span>
        </div>
        <div class="cart-summary-line" id="cart-subtotal-shipping">
                        <span class="label">
                          {{__('front.Shipping:')}}
                      </span>
            <span class="value">{{__('front.Free')}}</span>
            <div><small class="value"></small></div>
        </div>


        <div class="cart-summary-totals">


            <div class="cart-summary-line cart-total">
                <span class="label">{{__('front.Total:')}}</span>
                <span class="value">{{\Cart::getTotal()}}{{__('front.LE')}}</span>
            </div>


        </div>


    </div>


{{--    <div class="blockreassurance_product">--}}
{{--        <div>--}}
{{--                                        <span class="item-product">--}}
{{--                                            <img class="svg invisible"--}}
{{--                                                 src="/savemart/modules/blockreassurance/img/ic_verified_user_black_36dp_1x.png">--}}
{{--                                                                &nbsp;--}}
{{--                                        </span>--}}
{{--            <p class="block-title" style="color:#000000;">Security policy (edit with Customer reassurance--}}
{{--                module)</p>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--                                                <span class="item-product">--}}
{{--                                                                                            <img class="svg invisible"--}}
{{--                                                                                                 src="/savemart/modules/blockreassurance/img/ic_local_shipping_black_36dp_1x.png">--}}
{{--                                                                        &nbsp;--}}
{{--                                                </span>--}}
{{--            <p class="block-title" style="color:#000000;">Delivery policy (edit with Customer reassurance--}}
{{--                module)</p>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="item-product">--}}
{{--                                                        <img class="svg invisible"--}}
{{--                                                             src="/savemart/modules/blockreassurance/img/ic_swap_horiz_black_36dp_1x.png">--}}
{{--                                    &nbsp;--}}
{{--            </span>--}}
{{--            <p class="block-title" style="color:#000000;">Return policy (edit with Customer reassurance--}}
{{--                module)</p>--}}
{{--        </div>--}}
{{--        <div class="clearfix"></div>--}}
{{--    </div>--}}

</div>
