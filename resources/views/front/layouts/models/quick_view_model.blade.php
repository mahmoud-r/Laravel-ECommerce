<!-- Modal -->
<div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons close">close</i>
            </button>
        </div>
        <div class="modal-body">
            <div class="row no-gutters">
                <div class="col-md-5 col-sm-5 divide-right">
                    <div class="images-container bottom_thumb">
                        <div class="product-cover">
                            <img class="js-qv-product-cover img-fluid" width="100%"
                                 src="{{url('images/product').'/'.$product->images[0]->name}}"
                                 alt="{{$product->name}}"
                                 title="{{$product->name}}" itemprop="image">
                            @if(!empty($product->old_price))
                                <div class="product-flags discount">-{{round((($product->old_price-$product->price)/$product->old_price)*100) }}%</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7">
                    <a href="{{route('product',$product->id)}}">
                        <h1 class="product-name">{{$product->name}}</h1>
                    </a>
                    <div class="product-prices">
                        <div class="product-price has-discount">
                            <div class="current-price">
                                <span itemprop="price" class="price" content="{{$product->price}}">{{$product->price}}{{__('front.LE')}}</span>
                                @if(!empty($product->old_price))
                                    <span class="regular-price">{{$product->old_price}}{{__('front.LE')}}</span>
                                @endif
                            </div>
                        </div>
                        <div id="product-description-short" itemprop="description">
                            <p>
                                {!! $product->short_description !!}
                            </p>
                        </div>
                        <div class="in_border end">

                            <div class="sku">
                                <label class="control-label">{{__('front.Sku:')}}</label>
                                <span itemprop="sku" content="demo_5" style="color: red;font-weight: bold">
                                               {{$product->quantity >= 1 ? $product->quantity : __('front.out of stock')}}
                                            </span>
                            </div>
                            <div class="pro-cate">
                                <label class="control-label">{{__('front.Category:')}}</label>
                                <div>

                                                <span><a
                                                        href="{{route('GetProductByCategory',$product->Categorie->name)}}"
                                                        title="{{$product->Categorie->name}}">{{$product->Categorie->name}}</a></span>

                                </div>
                            </div>
                            <div class="pro-cate">
                                <label class="control-label">{{__('front.Brand:')}}</label>
                                <div>

                                                <span><a href="{{route('GetProductByBrand',$product->brand->name)}}"
                                                         title="{{$product->brand->name}}">{{$product->brand->name}}</a></span>

                                </div>
                            </div>

                        </div>

                        <div class="product-actions">
                            <div class="product-add-to-cart in_border">
                                <div class="add">
                                    <form action="{{route('cart.add_and_refresh')}}" method="post" class=" addCart">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="Quantity" value="1">
                                        <button type="submit" class=" btn btn-primary add-to-cart"
                                                style="border: none;cursor: pointer" href="#">
                                            <div class="icon-cart">
                                                <i class="shopping-cart"></i>
                                            </div>
                                            <span>{{__('front.Add to cart')}}</span></button>

                                    </form>

                                </div>
                                <form action="{{route('wishlist.store_and_refresh')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="id">
                                    <button class="addToWishlist wishlistProd_4" href="#"
                                            style="border: none;cursor: pointer" data-product-id="{{$product->id}}">
                                        <i class="fa fa-heart"></i>
                                        <span>Add to Wishlist</span>
                                    </button>
                                </form>

                                <div class="clearfix"></div>
                                <div id="product-availability" class="info-stock mt-20">
                                    @if($product->quantity >= 1)
                                        <label class="control-label ml-2 ">{{__('front.Availability:')}}</label>

                                        @if($product->quantity >= 1)
                                            {{__('front.in stock')}}
                                        @else
                                            {{__('front.OUT OF STOCK')}}
                                        @endif
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
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

@section('script')

@endsection
