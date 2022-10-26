<!doctype html>
{{--<html lang="{{LaravelLocalization::getCurrentLocale()}}">--}}
@include('front.layouts.head')

<body
    @yield('id_body') class=" {{LaravelLocalization::getCurrentLocale()=='ar'?'lang-rtl lang-ar': 'lang-en'}} country-gb currency-gbp layout-full-width page-index tax-display-enabled">

<main id="main-site" class="displayhomenovfour">
    @include('front.layouts.header')

    <div id="wrapper-site">

        @yield('nav')
        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @include('front.layouts.message')

                    <div id="main" style="margin-bottom: 6rem">


                        @yield('content')

                    </div>

                </div>

            </div>
        </div>

    </div>
    @include('front.layouts.footer')
</main>
@include('front.layouts.mobile')
<div class="modal fade bd-example-modal-lg quickview in" tabindex="-1" id="quick-product" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
<div class="modal fade bd-example-modal-lg quickview in" tabindex="-1" id="blockcart-modal" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
    @include('front.layouts.models.WishlistModal')
<script type="text/javascript"
        src="{{URL('design/front/js/js.js')}}">

</script>


@yield('script')
@include('front.customJS')
</body>
</html>
