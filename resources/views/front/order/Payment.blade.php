@section('style')

@endsection

@section('title')

@endsection

@section('description')

@endsection
@section('id_body')
    id="checkout"
@endsection
@section('nav')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-md-9">


                <section id="checkout-personal-information-step"
                         class="checkout-step -reachable -complete">
                    <h1 class="step-title h3">
                        <span class="step-number">1</span>
                        {{__('front.Personal Information')}}
                        <span class="step-edit"><i class="material-icons edit">mode_edit</i> {{__('front.edit')}}</span>
                    </h1>

                    <div class="content">
                        <p class="identity">
                            {{__('front.Connected as')}} <a href='{{route('profile')}}'>{{Auth::user()->name}}</a>.
                        </p>
                        <p>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            {{__('front.Not you?')}}
                            <button type="submit" class="logout"
                                    style="border:none; background: none;  color: inherit; font: inherit;cursor: pointer;"
                                    rel="nofollow" title="Log me out">{{__('front.Sign out')}}
                            </button>
                        </form>
                        </p>
                        <p><small>{{__('front.If you sign out now, your cart will be emptied.')}}</small></p>


                    </div>

                </section>

                <section id="checkout-addresses-step"
                         class="checkout-step -reachable -complete"
                >
                    <h1 class="step-title h3">
                        <span class="step-number">2</span>
                        {{__('front.Addresses')}}
                        <span class="step-edit"><i class="material-icons edit">mode_edit</i>{{__('front.edit')}}</span>
                    </h1>

                    <div class="content">

                        <div class="js-address-form">
                            <form
                                method="POST"
                                action="{{route('SaveAddress')}}">
                                <div id="delivery-addresses" class="row address-selector js-address-selector">
                                    @csrf
                                    @forelse($addresses as $address)
                                        <article
                                            class="col address-item selected"
                                            id="id-address-delivery-address-124">
                                            <header>
                                                <label class="radio-block">
                                                <span class="custom-radio">
                                                  <input
                                                      type="radio"
                                                      name="address"
                                                      {{$address->id == $selected_address? 'checked':''}}
                                                      value="{{$address->id}}">
                                                  <span></span>
                                                </span>
                                                    <span class="address-alias">{{__('front.My Address')}}</span>
                                                </label>
                                                <div class="row vendor-content-detail"
                                                     style="padding-left: 20px; margin-top: 15px ;margin-bottom: 15px">
                                                    <div class="content-seller-vendor">

                                                        <div class="ps-vendor-fullname">
                                                            <p>{{$address->first_name}} {{$address->last_name}}</p>
                                                        </div>
                                                        <div class="ps-vendor-detail">
                                                            <p><label><b>{{__('front.City : ')}}</b>{{$address->City}}</label></p>
                                                        </div>
                                                        <div class="ps-vendor-detail"
                                                             style="text-overflow: ellipsis;overflow: hidden">
                                                            <p><label><b>{{__('front.Address :')}} </b>{{$address->address}}</label></p>
                                                        </div>
                                                        <div class="ps-vendor-detail">
                                                            <p><label><b>{{__('front.Phone : ')}} </b>{{$address->phone}}</label></p>
                                                        </div>
                                                        <div class="ps-vendor-detail">
                                                            <p><label><b>{{__('front.Other Phone : ')}}</b>{{$address->other_phone}}</label></p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </header>
                                            <footer class="address-footer">
                                                <a
                                                    class="edit-address text-muted"
                                                    data-link-action="edit-address"
                                                    href="{{route('address.edit',$address->id)}}">
                                                    <i class="material-icons edit">&#xE254;</i><span>{{__('front.Edit')}}</span>
                                                </a>
                                            </footer>
                                        </article>
                                    @empty
                                    @endforelse


                                </div>

                                <p class="add-address">
                                    <a href="{{route('address.create')}}"><i
                                            class="material-icons">&#xE145;</i><span>{{__('front.Create  New address')}}</span></a>
                                </p>

                                <p>
                                    <a data-link-action="different-invoice-address"
                                       href="https://demo.bestprestashoptheme.com/savemart/en/order?use_same_address=0">
                                    </a>
                                </p>


                                <div class="clearfix">
                                    @if(!empty($address))
                                        <button type="submit" class="btn btn-primary continue pull-xs-right"
                                                name="confirm-addresses" value="{{$address->id}}">
                                            {{__('front.Continue')}}
                                        </button>
                                    @endif
                                </div>

                            </form>
                        </div>

                    </div>

                </section>


                <section id="checkout-delivery-step"
                         class="checkout-step -reachable -complete"
                >
                    <h1 class="step-title h3">
                        <span class="step-number">3</span>
                        {{__('front.Shipping Method')}}
                        <span class="step-edit"><i class="material-icons edit">mode_edit</i> {{__('front.edit')}}</span>
                    </h1>

                    <div class="content">

                        <div id="hook-display-before-carrier">

                        </div>

                        <div class="delivery-options-list">
                            <form
                                class="clearfix"
                                id="js-delivery"
                                action="{{route('SaveShipping')}}"
                                method="post">
                                @csrf
                                <input type="hidden" name="address" value="{{$selected_address}}">
                                <div class="form-fields">

                                    <div class="delivery-options">
                                        <div class="row carrier-extra-content">

                                        </div>
                                        <div class="row no-gutters delivery-option align-items-center last">
                                            <div class="col-sm-1">
                                                  <span class="custom-radio pull-xs-left">
                                                    <input type="radio"  checked name="shipping_method"  value="delivery">
                                                    <span></span>
                                                  </span>
                                            </div>
                                            <div for="delivery_option_2" class="col-sm-11 delivery-option-2">
                                                <div class="row align-items-center">

                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="carrier-name">Delivery</div>
                                                        <div class="carrier-delay">Delivery next day!</div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-12 text-right">
                                                        <span class="carrier-price">{{__('front.Free')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row carrier-extra-content" style="display:none;">

                                        </div>
                                    </div>

                                    <div class="order-options">
                                    </div>
                                </div>
                                <button type="submit" class="continue btn btn-primary pull-right"
                                        name="confirmDeliveryOption" value="1">
                                    {{__('front.Continue')}}
                                </button>
                            </form>
                        </div>

                        <div id="hook-display-after-carrier">

                        </div>

                        <div id="extra_carrier"></div>

                    </div>

                </section>


                <section id="checkout-payment-step"
                         class="checkout-step -current -reachable js-current-step">
                    <h1 class="step-title h3">
                        <span class="step-number">4</span>
                        {{__('front.Payment')}}
                        <span class="step-edit"><i class="material-icons edit">mode_edit</i>{{__('front.edit')}}</span>
                    </h1>

                    <div class="content">

                           <form method="post" action="{{route('CreateOrder')}}" >
                            @csrf
                               <input type="hidden" name="address" value="{{$selected_address}}">
                               <input type="hidden" name="shipping_method" value="{{$shipping_method}}">

                               <div class="payment-options">
                             <div>
                                <div id="payment-option-1-container" class="payment-option clearfix">
                                  <span class="custom-radio pull-xs-left">
                                  <input
                                      class="ps-shown-by-js "
                                      name="payment_method"
                                      type="radio"
                                      checked
                                      required
                                      value="OnDelivery">
                                  <span></span>
                                </span>


                                    <label for="payment-option-1">
                                        <span>Cash on delivery</span>
                                    </label>

                                </div>
                            </div>

                        </div>

                                <div id="payment-confirmation">
                                    <div class="ps-shown-by-js">
                                        <button type="submit"  class="btn btn-primary center-block">
                                            {{__('front.Order with an obligation to pay')}}
                                        </button>
                                    </div>
                                    <div class="ps-hidden-by-js">
                                    </div>
                                </div>

                            </form>
                    </div>
                </section>


            </div>
            @include('front.order.details')
        </div>
    </section>

@endsection

@section('script')
    <script>

    </script>
@endsection


@include('front.master')
