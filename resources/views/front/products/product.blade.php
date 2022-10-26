@section('meta')
    <meta property="og:type" content="product">
    <meta property="og:url" content="{{URL::current()}}">
    <meta property="og:title" content="{{$product->name}}">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:description" content="{{$product->description}}">
    <meta property="og:image" content="{{url('images/product').'/'.$product->images[0]->name}}}}">
    <meta property="product:pretax_price:amount" content="13.2">
    <meta property="product:pretax_price:currency" content="EGP">
    <meta property="product:price:amount" content="{{$product->price}}">
    <meta property="product:price:currency" content="EGP">
@endsection
@section('style')
    <style>
        .product-rate fieldset, label {
            margin: 0;
            padding: 0;
        }

        /*body{ margin: 20px; }*/
        .product-rate h1 {
            font-size: 1.5em;
            margin: 10px;
        }

        /****** Style Star Rating Widget *****/

        .product-rate .rating {
            border: none;
        }

        .product-rate .myratings {

            font-size: 85px;
            color: green;
        }

        .product-rate .rating > [id^="star"] {
            display: none;
        }

        .product-rate .rating > label:before {
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .product-rate .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .product-rate .rating > label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .product-rate .rating > [id^="star"]:checked ~ label, /* show gold star when clicked */
        .product-rate .rating:not(:checked) > label:hover, /* hover current star */
        .product-rate .rating:not(:checked) > label:hover ~ label {
            color: #FFD700;
        }

        /* hover previous stars in list */

        .product-rate .rating > [id^="star"]:checked + label:hover, /* hover current star when changing rating */
        .product-rate .rating > [id^="star"]:checked ~ label:hover,
        .product-rate .rating > label:hover ~ [id^="star"]:checked ~ label, /* lighten current selection */
        .product-rate .rating > [id^="star"]:checked ~ label:hover ~ label {
            color: #FFED85;
        }

        .product-rate .reset-option {
            display: none;
        }

        .product-rate .reset-button {
            margin: 6px 12px;
            background-color: rgb(255, 255, 255);
            text-transform: uppercase;
        }


        .product-rate .mt-100 {
            margin-top: 100px
        }

        .product-rate .card {
            position: relative;
            display: flex;
            width: 350px;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 11px;
            -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
            -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
            box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
        }

        .product-rate .card .card-body {
            padding: 1rem 1rem
        }

        .product-rate .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .product-rate p {
            font-size: 14px
        }

        .product-rate h4 {
            margin-top: 18px
        }

        .product-rate .btn:focus {
            outline: none
        }


    </style>
@endsection

@section('title')
    {{$product->name}}
@endsection

@section('description')
    {{$product->sub_Categorie->name}}
@endsection
@section('nav')
    <nav data-depth="3" class="breadcrumb-bg">
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
                        <a itemprop="item" href="{{route('GetProductByCategory',$product->Categorie->name)}}">
                            <span itemprop="name">{{$product->Categorie->name}}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('GetProductByCategory',$product->sub_Categorie->name)}}">
                            <span itemprop="name">{{$product->sub_Categorie->name}}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('product',$product->id)}}">
                            <span itemprop="name">{{$product->name}}</span>
                        </a>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>

            </div>
        </div>
    </nav>

@endsection

@section('content')
    <meta itemprop="url" content="{{$product->name}}">
    <div class="product-detail-top" id="product">
        <div class="container">
            <div class="row main-productdetail" data-product_layout_thumb="list_thumb" style="position: relative;">
                <div class="col-lg-4 col-md-4 col-xs-12 box-image">

                    <section class="page-content" id="content">


                        <div class="images-container thumb-vertical d-flex left_thumb">

                            <div class="js-qv-mask mask only-product">
                                <div class="product-images slick-images" data-autoplay="false"
                                     data-autoplayTimeout="6000" data-items="4" data-margin="10" data-nav="true"
                                     data-dots="false" data-loop="false" data-items_mobile="3" data-vertical="true">
                                    @foreach($product->images as $img)

                                        <div class="item thumb-container">
                                            <img
                                                class="img-fluid thumb js-thumb"
                                                data-image-medium-src="{{url('images/product').'/'.$img->name}}"
                                                data-image-large-src="{{url('images/product').'/'.$img->name}}"
                                                data-position-image="0"
                                                src="{{url('images/product').'/'.$img->name}}"
                                                alt="{{$img->name}}"
                                                title="{{$img->name}}"
                                                itemprop="image"
                                            >
                                        </div>

                                    @endforeach

                                </div>
                            </div>


                            <div class="product-cover">
                                <img
                                    class="js-qv-product-cover img-fluid"
                                    src="{{url('images/product').'/'.$product->images[0]->name}}"
                                    alt="{{$product->name}}"
                                    title="{{$product->name}}"
                                    style="width:100%;"
                                    itemprop="image"
                                >
                                @if(!empty($product->old_price))
                                    <div class="product-flags discount">-{{round((($product->old_price-$product->price)/$product->old_price)*100) }}%</div>
                                @endif
                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                    <i class="fa fa-expand"></i>
                                </div>
                            </div>

                        </div>


                    </section>

                </div>

                <div class="col-lg-8 col-md-8 col-xs-12 mt-sm-20">
                    <div class="product-information">
                        <div class="product-actions">

                            <form action="{{route('cart.add')}}" method="post" class="row addCart">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}"
                                       id="product_page_product_id">
                                <div class="productdetail-right col-12 col-lg-8 col-md-8">
                                    <div class="product-reviews">
                                        <div id="product_comments_block_extra">

                                            <div class="comments_note">
                                                <span>Review: </span>
                                                <div class="star_content clearfix">
                                                    <div
                                                        class="star {{$product->reviews->avg('review') >= 1 ? 'star_on' : ''}}"></div>
                                                    <div
                                                        class="star {{$product->reviews->avg('review') >= 2 ? 'star_on' : ''}}"></div>
                                                    <div
                                                        class="star {{$product->reviews->avg('review') >= 3 ? 'star_on' : ''}}"></div>
                                                    <div
                                                        class="star {{$product->reviews->avg('review') >= 4 ? 'star_on' : ''}}"></div>
                                                    <div
                                                        class="star {{$product->reviews->avg('review') >= 5 ? 'star_on' : ''}}"></div>
                                                </div>
                                            </div>


                                            <div class="comments_advices">
                                                @if(count($product->reviews) >= 1)
                                                    <a href="#reviews" data-toggle="tab" id="readrewview"
                                                       class="comments_advices_tab"><i class="fa fa-comments"></i>
                                                        {{__('front.Read reviews:')}}({{count($product->reviews)}})</a>
                                                @endif
                                                <a class="open-comment-form" data-toggle="modal"
                                                   data-target="#new_comment_form" href="#"><i class="fa fa-edit"></i>
                                                    {{__('front.Write your review !')}}
                                                </a>
                                            </div>
                                        </div>


                                        <!--  /Module NovProductComments -->

                                    </div>

                                    <h1 class="detail-product-name" itemprop="name">{{$product->name}}</h1>


                                    <div class="group-price d-flex justify-content-start align-items-center">

                                        <div class="product-prices">


                                            <div
                                                class="product-price has-discount"
                                                itemprop="offers"
                                                itemscope
                                                itemtype="https://schema.org/Offer"
                                            >
                                                <link itemprop="availability" href="https://schema.org/InStock"/>
                                                <meta itemprop="priceCurrency" content="EGP">

                                                <div class="current-price">

                                                    <span itemprop="price" class="price"
                                                          content="{{$product->price}}">{{$product->price}}{{__('front.LE')}}</span>
                                                    @if(!empty($product->old_price))
                                                        <span class="regular-price">{{$product->old_price}}{{__('front.LE')}}</span>
                                                    @endif
                                                </div>


                                            </div>

                                            <div class="tax-shipping-delivery-label">
                                                Tax included
                                            </div>
                                        </div>

                                    </div>

                                    <div class="">
                                        <h3 class="control-label mb-10">{{__('front.Short Description:')}}</h3>
                                        <div class="product-description">
                                            <p>{!! $product->short_description !!}</p>
                                        </div>
                                    </div>
                                    <div id="_desktop_productcart_detail">
                                        <div class="product-add-to-cart in_border pt-0">
                                            <div class="add mt-10">
                                                <button class="btn btn-primary add-to-cart " type="submit">
                                                    <div class="icon-cart">
                                                        <i class="shopping-cart"></i>
                                                    </div>
                                                    <span>
                                                            @if($product->quantity >= 1)
                                                            {{__('front.Add to cart')}}
                                                        @else
                                                            {{__('front.out of stock')}}
                                                        @endif
                                                        </span>
                                                </button>
                                            </div>
                                            <a class="addToWishlist wishlistProd_4" href="#"
                                               data-product-id="{{$product->id}}">
                                                <i class="fa fa-heart"></i>
                                                <span>{{__('front.Add to Wishlist')}}</span>
                                            </a>
                                            <div class="clearfix"></div>
                                            <div id="product-availability" class="info-stock w-100 mt-20">
                                                @if($product->quantity >= 1)
                                                    <label class="control-label ">{{__('front.Availability:')}}</label>

                                                    {{__('front.in stock')}}

                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                @endif
                                            </div>


                                            <p class="product-minimal-quantity mt-20">
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="productdetail-left col-12 col-lg-4 col-md-4">
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

                                    <div class="productdetail-left col-12 ">
                                        <div class="product-quantity">
                                            <span class="control-label">{{__('front.Quantity : ')}}</span>
                                            <div class="qty">
                                                <input
                                                    type="text"
                                                    name="Quantity"
                                                    id="quantity_input"
                                                    value="1"
                                                    class="input-group quantity_input "
                                                    min="1"
                                                    max="{{$product->quantity}}"

                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div id="_mobile_productcart_detail"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="product-detail-middle" id="product-detail-middle">
        <div class="container">
            <div class="row">
                <div class="tabs col-lg-9 col-md-7 ">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#description">{{__('front.Description')}}</a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" data-toggle="tab" href="#reviews">{{__('front.Write Your Own Review')}}<span
                                    class='count-comment'> ({{count($product->reviews)}})</span></a>
                        </li>


                    </ul>

                    <div class="tab-content" id="tab-content">
                        <div class="tab-pane fade in active" id="description">

                            <div class="product-description">
                                {!! $product->description !!}
                            </div>

                        </div>


                        <div class="tab-pane fade in" id="reviews">
                            @if(count($product->reviews) >=1)
                                <div id="product_comments_block_tab">
                                    @foreach($product->reviews as $review)
                                        <div class="comment clearfix">
                                            <div class="comment_author">
                                                <span>Grade&nbsp</span>
                                                <div class="star_content clearfix">
                                                    <div class="star {{$review->review >= 1 ? 'star_on' : ''}}"></div>
                                                    <div class="star {{$review->review >= 2 ? 'star_on' : ''}}"></div>
                                                    <div class="star {{$review->review >= 3 ? 'star_on' : ''}}"></div>
                                                    <div class="star {{$review->review >= 4 ? 'star_on' : ''}}"></div>
                                                    <div class="star {{$review->review >= 5 ? 'star_on' : ''}}"></div>
                                                </div>
                                                <div class="comment_author_infos">
                                                    <div class="user-comment"><i
                                                            class="fa fa-user-o"></i>{{$review->user->name}}</div>
                                                    <div
                                                        class="date-comment">{{date('d-m-Y', strtotime($review->created_at))}}</div>
                                                </div>
                                            </div>
                                            <div class="comment_details">
                                                <p>{{$review->comment}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <p class="text-center mt-10">
                                    <a id="new_comment_tab_btn" class="open-comment-form btn btn-default"
                                       data-toggle="modal" data-target="#new_comment_form" href="#">{{__('front.Write your review !')}}</a>
                                </p>

                            @else
                                <p class="text-center mt-10">
                                    <a id="new_comment_tab_btn" class="open-comment-form" data-toggle="modal"
                                       data-target="#new_comment_form" href="#">{{__('front.Be the first to write your review !')}}</a>
                                </p>
                            @endif
                        </div>


                        @include('front.products.review')
                        @include('front.layouts.models.ReviewSuccsessModal')
                    </div>

                </div>

                <div class="col-lg-3 col-md-5">
                    {{--                    Bestseller--}}
                    <div
                        class="nov-productlist     productlist-liststyle-3  col-xl-12 col-lg-12 col-md-12 col-xs-12 no-padding">
                        <div class="block block-product clearfix">
                            <h2 class="title_block">
                                {{__('front.Best Seller')}}
                            </h2>
                            <div class="block_content">
                                <div id="productlist320258774"
                                     class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false"
                                     data-autoplayTimeout="6000" data-loop="false" data-margin="0" data-dots="false"
                                     data-nav="true" data-items="1" data-items_large="1" data-items_tablet="1"
                                     data-items_mobile="1">
                                    @if(count($bestsealer) > 0)
                                        <div class="item  text-center">
                                            @foreach($bestsealer as $item)
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

                                    @if(count($bestsealer) > 3)
                                        <div class="item  text-center">
                                            @foreach($bestsealer as $item)
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

                    {{--                    TRENDING NOW--}}
                    <div
                        class="nov-productlist     productlist-liststyle-3  col-xl-12 col-lg-12 col-md-12 col-xs-12 no-padding">
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


                    <div class="nov-html col-xl-12 col-lg-12 col-md-12 policy-product no-padding">
                        <div class="block">
                            <div class="block_content">
                                <div class="policy-row d-flex">
                                    <div class="icon-policy"><i class="noviconpolicy noviconpolicy-1">1</i></div>
                                    <div class="policy-content">
                                        <div class="policy-name">{{__('front.Free Delivery')}}</div>
                                        <div class="policy-des">{{__('front.From $ 250')}}</div>
                                    </div>
                                </div>
                                <div class="policy-row d-flex">
                                    <div class="icon-policy"><i class="noviconpolicy noviconpolicy-2">2</i></div>
                                    <div class="policy-content">
                                        <div class="policy-name">{{__('front.Money Back')}}</div>
                                        <div class="policy-des">{{__('front.Guarantee')}}</div>
                                    </div>
                                </div>
                                <div class="policy-row d-flex">
                                    <div class="icon-policy"><i class="noviconpolicy noviconpolicy-3">3</i></div>
                                    <div class="policy-content">
                                        <div class="policy-name">{{__('front.Authenticity')}}</div>
                                        <div class="policy-des">{{__('front.100% guaranteed')}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="product-detail-bottom">
        <div class="container">

            <section class="relate-product product-accessories clearfix">
                <h3 class="h5 title_block">{{__('front.Related products')}}<span class="sub_title">Hand-picked arrivals from the best designer</span>
                </h3>
                <div
                    class="products product_list grid owl-carousel owl-theme"
                    data-autoplay="true"
                    data-autoplayTimeout="6000"
                    data-loop="true" data-items="4"
                    data-margin="0" data-nav="true"
                    data-dots="false" data-items_mobile="2">
                    @foreach($related_products as $item)
                        <div class="item  text-center">
                            <div class="product-miniature js-product-miniature item-two first_item" data-id-product="1"
                                 data-id-product-attribute="40" itemscope itemtype="http://schema.org/Product">
                                <div class="product-cat-content">

                                    <div class="category-title"><a
                                            href="{{route('GetProductByCategory',$item->Categorie->id)}}">{{$item->Categorie->name}}</a>
                                    </div>


                                    <div class="product-title" itemprop="name"><a
                                            href="{{route('product',$item->id)}}">{{Str::words($item->name,10)}}</a>
                                    </div>

                                </div>
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
                                        @if(!empty($item->images[1]->name))
                                            <img
                                                class="img-fluid image-secondary"
                                                src="{{url('images/product').'/'.$item->images[1]->name}}"
                                                alt=""
                                                data-full-size-image-url="{{url('images/product').'/'.$item->images[1]->name}}"
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
                                <div class="product-description">
                                    <div class="product-groups">
                                        <div class="product-group-price">

                                            <div class="product-price-and-shipping">


                                                <span itemprop="price" class="price">{{$item->price}}{{__('front.LE')}}</span>


                                            </div>

                                        </div>
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
                                        <div class="product-buttons d-flex justify-content-center">
                                            <form action="{{route('cart.add')}}" method="post" class=" addCart">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                <input type="hidden" name="Quantity" value="1">
                                                <button type="submit" class="add-to-cart"
                                                        style="border: none;cursor: pointer" href="#"><i
                                                        class="novicon-cart"></i><span>Add to cart</span></button>
                                            </form>

                                            <a class="addToWishlist wishlistProd_4" href="#"
                                               data-product-id="{{$item->id}}">
                                                <i class="fa fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>
                                            <a href="#" class="quick-product add-to-cart hidden-sm-down"
                                               data-product-id="{{$item   ->id}}">
                                                <i class="fa fa-search"></i><span> Quick view</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>


        </div>
    </div>

    <div class="modal fade js-product-images-modal" id="product-modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <figure>
                        <img class="js-modal-product-cover product-cover-modal" width="600"
                             src="{{url('images/product').'/'.$product->images[0]->name}}" alt="{{$product->name}}"
                             title="{{$product->name}}" itemprop="image">
                    </figure>
                    <aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">

                        <div class="js-modal-mask mask  nomargin ">
                            <ul class="product-images js-modal-product-images">
                                @foreach($product->images as $img)
                                    <li class="thumb-container">
                                        <img data-image-large-src="{{url('images/product').'/'.$img->name}}"
                                             class="thumb js-modal-thumb" src="{{url('images/product').'/'.$img->name}}"
                                             alt="{{$product->name}}" title="{{$product->name}}" width="125"
                                             itemprop="image">
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $("input[type='radio']").click(function () {
                var sim = $("input[type='radio']:checked").val();
                //alert(sim);
                if (sim < 3) {
                    $('.myratings').css('color', 'red');
                    $(".myratings").text(sim);
                } else {
                    $('.myratings').css('color', 'green');
                    $(".myratings").text(sim);
                }
            });


        });
    </script>
@endsection


@include('front.master')
