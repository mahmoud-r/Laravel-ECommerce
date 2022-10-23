
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


<script>
    // remove cart
    $(function () {
        $(".remove-from-cart").click(function (e) {
            e.preventDefault()
            var item = $(this).attr('data-item-id');

            var actionUrl = '{{route('cart.remove')}}';
            $.ajax({
                url: actionUrl,
                type: 'GET',
                data: {'item': item},
                success: function (response) {
                    $('[data-item = "' + item + '"]').remove()
                    $('.remove-cart-alert').show()
                    $('.total').text(response.total)
                    $('.sub-total').text(response.subtotal)
                    $('.count').text(response.count)
                    $('.countInCart').text('There are ' + response.countInCart + ' items in your cart')
                    $('#cart_block').html(response.html);


                },
                error: function (response) {
                    console.log(response.errors)
                }
            });
        });
    });
</script>
