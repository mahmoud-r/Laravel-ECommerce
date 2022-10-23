@section('style')

@endsection

@section('title')
    {{__('front.Checkout')}}
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
                         class="checkout-step -current -reachable js-current-step">
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


                <section class="checkout-step -unreachable" id="checkout-delivery-step">
                    <h1 class="step-title h3">
                        <span class="step-number">3</span> {{__('front.Shipping Method')}}
                    </h1>
                </section>


                <section class="checkout-step -unreachable" id="checkout-payment-step">
                    <h1 class="step-title h3">
                        <span class="step-number">4</span>{{__('front.Payment')}}
                    </h1>
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
