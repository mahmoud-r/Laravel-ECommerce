
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-xs-center" id="myModalLabel">
                <i class='fa fa-check'></i>{{__('front.Product successfully added to your shopping cart')}}
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons close">close</i>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 divide-right">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img class="product-image img-fluid" src="{{url('images/product').'/'.$product->images[0]->name}}" alt="{{$product->name}}" title="{{$product->name}}" itemprop="image">
                        </div>
                        <div class="col-md-7">
                            <div class="h5 product-name">{{$product->name}}</div>
                            <div class="product-price">{{$product->price}}{{__('front.LE')}}</div>

                            <p>{{__('front.Quantity:')}}{{$qty}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-content">
                        <p class="cart-products-count">{{__('front.There is ')}}{{Cart::getTotalQuantity()}} {{__('front. item in your cart.')}}</p>
                        <p>{{__('front.Total products:')}}{{\Cart::getSubTotal()}}{{__('front.LE')}}</p>
                        <p>{{__('front.shipping : ')}};Free </p>
                        <p>{{__('front.Total')}}:&nbsp;{{\Cart::getTotal()}}{{__('front.LE')}}</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('front.Continue shopping')}}</button>
            <a href="{{route('cart')}}" class="btn btn-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i>{{__('front.Checkout')}}</a>
        </div>
    </div>
</div>
