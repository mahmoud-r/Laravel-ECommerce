<div class="nov-row  col-lg-12 col-xs-12">
    <div class="nov-row-wrap row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="block block-producttab producttab-rows   groupproduct-left " id="groupproducttab55853224">
                <div class="block-tab-title d-flex align-items-center justify-content-between">
                    <h4 class="title_block">
                        {{$Categore1->name}}
                    </h4>
                    <ul class="nav nav-tabs justify-content-center" role="tablist">

                        <li class="nav-item"><a href="#groupproducttab55853224newproducts" class="nav-link active"
                                                role="tab" data-toggle="tab">{{__('front.New Arrivals')}}</a></li>

                        <li class="nav-item"><a href="#groupproducttab55853224bestseller" class="nav-link" role="tab"
                                                data-toggle="tab">{{__('front.Best Seller')}}</a></li>

                        <li class="nav-item"><a href="#groupproducttab55853224featured" class="nav-link" role="tab"
                                                data-toggle="tab">{{__('front.Featured')}}</a></li>

                    </ul>
                </div>
                <div class="main-product-content  row d-flex ">
                    <div class="nov-image col-lg-4 hidden-md">
                        <div class="effect">
                            <a href="#">
                                <img class="img-fluid"
                                @if(!empty($banner1))
                                    <a href="{{$banner1->link}}">
                                        <img class="img-fluid" src="{{URL('images/banner').'/'.$banner3->image}}" alt="{{$banner3->name}}" title="{{$banner3->name}}">
                                    </a>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="block_content  col-lg-8 col-md-12 ">
                        <div class="product_tab_content tab-content">

{{--                            newproducts--}}
                            <div class="tab-pane fade in active" id="groupproducttab55853224newproducts">
                                <div id="groupproducttab55853224-newproducts"
                                     class="product_list grid owl-carousel owl-theme" data-autoplay="false"
                                     data-autoplayTimeout="6000" data-loop="true" data-margin="30" data-dots="false"
                                     data-nav="true" data-items="2" data-items_large="3" data-items_tablet="3"
                                     data-items_mobile="2">
                                    @if(count($new_products_categore1) > 0)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index < 3)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                        @if(count($new_products_categore1) > 3)
                                            <div class="item  text-center">
                                                @foreach($new_products_categore1 as $product)
                                                    @if($loop->index >= 3 && $loop->index <6)

                                                        <div
                                                            class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                            data-id-product="1" data-id-product-attribute="40" itemscope
                                                            itemtype="http://schema.org/Product">
                                                            <div class="col-12 col-w40 pl-0">
                                                                <div class="thumbnail-container">

                                                                    <a href="{{route('product',$product->id)}}"
                                                                       class="thumbnail product-thumbnail two-image">
                                                                        <img
                                                                            class="img-fluid image-cover"
                                                                            src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                            alt=""
                                                                            data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                            </div>
                                                            <div class="col-12 col-w60 no-padding">
                                                                <div class="product-description">
                                                                    <div class="product-groups">
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

                                                                        <div class="product-title" itemprop="name"><a
                                                                                href="{{route('product',$product->id)}}">
                                                                                {{Str::words($product->name,10)}}
                                                                            </a></div>

                                                                        <div class="product-group-price">

                                                                            <div class="product-price-and-shipping">


                                                                                <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                            </div>

                                                                        </div>
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

                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(count($new_products_categore1) > 6)
                                            <div class="item  text-center">
                                                @foreach($new_products_categore1 as $product)
                                                    @if($loop->index >= 6 && $loop->index < 9)

                                                        <div
                                                            class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                            data-id-product="1" data-id-product-attribute="40" itemscope
                                                            itemtype="http://schema.org/Product">
                                                            <div class="col-12 col-w40 pl-0">
                                                                <div class="thumbnail-container">

                                                                    <a href="{{route('product',$product->id)}}"
                                                                       class="thumbnail product-thumbnail two-image">
                                                                        <img
                                                                            class="img-fluid image-cover"
                                                                            src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                            alt=""
                                                                            data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                            </div>
                                                            <div class="col-12 col-w60 no-padding">
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-comments">
                                                                            <div class="star_content">
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                            </div>
                                                                            <span>5 review</span>
                                                                        </div>

                                                                        <div class="product-title" itemprop="name"><a
                                                                                href="{{route('product',$product->id)}}">
                                                                                {{Str::words($product->name,10)}}
                                                                            </a></div>

                                                                        <div class="product-group-price">

                                                                            <div class="product-price-and-shipping">


                                                                                <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                            </div>

                                                                        </div>
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

                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(count($new_products_categore1) > 9)
                                            <div class="item  text-center">
                                        @foreach($new_products_categore1 as $product)
                                            @if($loop->index >= 9 && $loop->index < 12)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                            @endif
                                        @endforeach
                                    </div>
                                        @endif
                                        @if(count($new_products_categore1) > 12)
                                            <div class="item  text-center">
                                        @foreach($new_products_categore1 as $product)
                                            @if($loop->index >= 12 && $loop->index < 15)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                            @endif
                                        @endforeach
                                    </div>
                                        @endif
                                        @if(count($new_products_categore1) > 15)
                                             <div class="item  text-center">
                                        @foreach($new_products_categore1 as $product)
                                            @if($loop->index >= 15 && $loop->index < 19)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                            @endif
                                        @endforeach
                                    </div>
                                        @endif

                                </div>
                            </div>

{{--                            bestseller--}}
                            <div class="tab-pane fade" id="groupproducttab55853224bestseller">
                                <div id="groupproducttab55853224-bestseller"
                                     class="product_list grid owl-carousel owl-theme" data-autoplay="true"
                                     data-autoplayTimeout="6000" data-loop="true" data-margin="30" data-dots="false"
                                     data-nav="true" data-items="2" data-items_large="3" data-items_tablet="3"
                                     data-items_mobile="2">
                                    @if(count($best_seller_categore1) > 0)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index < 3)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(count($best_seller_categore1) > 3)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index >= 3 && $loop->index <6)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($best_seller_categore1) > 6)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index >= 6 && $loop->index < 9)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($best_seller_categore1) > 9)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index >= 9 && $loop->index < 12)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($best_seller_categore1) > 12)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index >= 12 && $loop->index < 15)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($best_seller_categore1) > 15)
                                        <div class="item  text-center">
                                            @foreach($new_products_categore1 as $product)
                                                @if($loop->index >= 15 && $loop->index < 19)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

{{--                            featured--}}
                            <div class="tab-pane fade" id="groupproducttab55853224featured">
                                <div id="groupproducttab55853224-featured"
                                     class="product_list grid owl-carousel owl-theme" data-autoplay="true"
                                     data-autoplayTimeout="6000" data-loop="true" data-margin="30" data-dots="false"
                                     data-nav="true" data-items="2" data-items_large="3" data-items_tablet="3"
                                     data-items_mobile="2">
                                    @if(count($featured_categore1) > 0)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index < 3)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(count($featured_categore1) > 3)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index >= 3 && $loop->index <6)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($featured_categore1) > 6)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index >= 6 && $loop->index < 9)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($featured_categore1) > 9)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index >= 9 && $loop->index < 12)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($featured_categore1) > 12)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index >= 12 && $loop->index < 15)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($featured_categore1) > 15)
                                        <div class="item  text-center">
                                            @foreach($featured_categore1 as $product)
                                                @if($loop->index >= 15 && $loop->index < 19)

                                                    <div
                                                        class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                        data-id-product="1" data-id-product-attribute="40" itemscope
                                                        itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w40 pl-0">
                                                            <div class="thumbnail-container">

                                                                <a href="{{route('product',$product->id)}}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{url('images/product').'/'.$product->images[0]->name}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{url('images/product').'/'.$product->images[0]->name}}"
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
                                                        </div>
                                                        <div class="col-12 col-w60 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">
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

                                                                    <div class="product-title" itemprop="name"><a
                                                                            href="{{route('product',$product->id)}}">
                                                                            {{Str::words($product->name,10)}}
                                                                        </a></div>

                                                                    <div class="product-group-price">

                                                                        <div class="product-price-and-shipping">


                                                                            <span itemprop="price" class="price">{{$product->price}}{{__('front.LE')}}</span>


                                                                        </div>

                                                                    </div>
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
    </div>
</div>
