<div class="nov-row  col-lg-12 col-xs-12" >
    <div class="nov-row-wrap row">
        <div class="nov-productlist   productlist-slider  col-xl-12 col-lg-12 col-md-12 col-xs-12 ">
            <div class="block block-product clearfix">
                <h2 class="title_block">
                    {{__('front.TRENDING NOW')}}
                </h2>
                <div class="block_content">
                    <div id="productlist1266997062" class="product_list grid owl-carousel owl-theme" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="0" data-dots="false" data-nav="true" data-items="4" data-items_large="3" data-items_tablet="3" data-items_mobile="2" >
                        @foreach($best_seller as $product)
                            <div class="item  text-center">
                                <div class="product-miniature js-product-miniature item-two first_item" data-id-product="1" data-id-product-attribute="40" itemscope itemtype="http://schema.org/Product">
                                    <div class="product-cat-content">

                                        <div class="category-title"><a href="{{route('GetProductByCategory',$product->Categorie->name)}}">{{$product->Categorie->name}}</a></div>


                                        <div class="product-title" itemprop="name"><a href="{{route('product',$product->id)}}">{{Str::words($product->name,10)}}</a></div>

                                    </div>
                                    <div class="thumbnail-container">

                                        <a href="{{route('product',$product->id)}}" class="thumbnail product-thumbnail two-image">
                                            <img
                                                class="img-fluid image-cover"
                                                src = "{{url('images/product').'/'.$product->images[0]->name}}"
                                                alt = ""
                                                data-full-size-image-url = "{{url('images/product').'/'.$product->images[0]->name}}"
                                                width="600"
                                                height="600"
                                            >
                                            @if(!empty($product->images[1]->name))
                                                <img
                                                    class="img-fluid image-secondary"
                                                    src = "{{url('images/product').'/'.$product->images[1]->name}}"
                                                    alt = ""
                                                    data-full-size-image-url = "{{url('images/product').'/'.$product->images[1]->name}}"
                                                    width="600"
                                                    height="600"
                                                >
                                            @else
                                                <img
                                                    class="img-fluid image-secondary"
                                                    src = "{{url('images/product').'/'.$product->images[0]->name}}"
                                                    alt = ""
                                                    data-full-size-image-url = "{{url('images/product').'/'.$product->images[0]->name}}"
                                                    width="600"
                                                    height="600"
                                                >
                                            @endif
                                        </a>
                                        @if(!empty($product->old_price))
                                            <div class="product-flags discount">-{{round((($product->old_price-$product->price)/$product->old_price)*100) }}%</div>
                                        @endif




                                    </div>
                                    <div class="product-description">
                                        <div class="product-groups">
                                            <div class="product-group-price">

                                                <div class="product-price-and-shipping">



                                                    <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>





                                                </div>

                                            </div>
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
                                            <div class="product-buttons d-flex justify-content-center" >
                                                <form action="{{route('cart.add')}}" method="post" class=" addCart">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <input type="hidden" name="Quantity" value="1">
                                                    <button type="submit" class="add-to-cart" style="border: none;cursor: pointer" href="#"><i class="novicon-cart"></i><span>Add to cart</span></button>
                                                </form>

                                                <a class="addToWishlist wishlistProd_4" href="#" data-product-id="{{$product->id}}">
                                                    <i class="fa fa-heart"></i>
                                                    <span>Add to Wishlist</span>
                                                </a>
                                                <a href="#" class="quick-product add-to-cart hidden-sm-down" data-product-id="{{$product->id}}">
                                                    <i class="fa fa-search"></i><span> Quick view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div></div>
