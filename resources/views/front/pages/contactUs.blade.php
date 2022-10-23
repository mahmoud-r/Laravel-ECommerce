

@section('style')
@endsection

@section('title')
        Contact US
@endsection

@section('description')

@endsection
@section('id_body')
    id="contact"
@endsection
@section('nav')
    <nav data-depth="2" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="#">
                            <span itemprop="name">Contact us</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section id="content" class="page-content">



        <h1 class="page_title">Contact us</h1>

        <div class="google-map">
            <div id="nov-map-contact"></div>
            <div class="map-locker"></div>
        </div>
        <div class="infomation-store">
            <div class="contact-rich row justify-content-between">

                <div class="block col col-xs-12">
                    <div class="icon"><i class="material-icons"></i></div>
                    <div class="data d-flex align-self-stretch email">
                        <div class="mr-2"><b>Email:</b></div>
                        <div><a href="{{Setting::get('default_email_address')}}">{{Setting::get('default_email_address')}}</a></div>
                    </div>
                </div>
                <div class="block col col-xs-12 mt-xs-10">
                    <div class="icon"><i class="material-icons">home</i></div>
                    <div class="data d-flex align-self-stretch">
                        <div class="mr-2"><b>Address:</b></div>
                        <div>{{Setting::get('address')}}</div>
                    </div>
                </div>
                <div class="block d-flex col col-xs-12 justify-content-md-end mt-xs-5">
                    <div class="icon"><i class="material-icons"></i></div>
                    <div class="data d-flex align-self-stretch">
                        <div class="mr-2"><b>Hotline:</b></div>
                        <div><a href="tel:{{Setting::get('phone')}}">{{Setting::get('phone')}}</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="desc-store text-center">
            <p>{!! Setting::get('contact_us_desc') !!}</p>
        </div>
{{--        <div class="text-center"><i class="icon-comment"></i></div>--}}
{{--        <div class="row justify-content-md-center">--}}
{{--            <div class="col-lg-6 co-md-6 col-sm-12 col-xs-12">--}}
{{--                <section class="contact-form">--}}
{{--                    <form action="https://demo.bestprestashoptheme.com/savemart/en/contact-us" method="post">--}}
{{--                        @csrf--}}

{{--                        <section class="form-fields">--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input class="form-control" name="name" value="{{!empty(Auth::user()->name)?Auth::user()->name:''}}" placeholder="Your name">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input class="form-control" name="from" type="email" value="{{!empty(Auth::user()->email)?Auth::user()->email:''}}" placeholder="Your email">--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            @auth--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <select name="id_order" class="form-control form-control-select">--}}
{{--                                        <option value="">Select reference</option>--}}
{{--                                        @foreach($orders as $order)--}}
{{--                                            <option value="{{$order->id}}">{{$order->order_number}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endauth--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <textarea class="form-control" name="message" placeholder="Message" rows="15"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </section>--}}

{{--                        <footer class="form-footer d-flex justify-content-end">--}}
{{--                            <style>--}}
{{--                                input[name=url] {--}}
{{--                                    display: none !important;--}}
{{--                                }--}}
{{--                            </style>--}}
{{--                            <input type="text" name="url" value="">--}}
{{--                            <input class="btn" type="submit" name="submitMessage" value="Send message">--}}
{{--                        </footer>--}}
{{--                    </form>--}}
{{--                </section>--}}

{{--            </div>--}}
{{--        </div>--}}

    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 30.044425, lng: 31.235633 };
            const map = new google.maps.Map(document.getElementById("nov-map-contact"), {
                zoom: 10,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello Rajkot!",
            });
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
@endsection


@include('front.master')
