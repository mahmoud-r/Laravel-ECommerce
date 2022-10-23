<div class="nov-row footer-center "  data-nov-full-width="true">
    <div class="nov-row-wrap row">
        <div class="nov-html col-xl-4 col-lg-4 col-md-4">
            <div class="block">
                <div class="block_content">
                    <p class="logo-footer"><img src="http://images.vinovathemes.com/prestashop_savemart/logo-footer.png" alt="logo" width="167" height="23" /></p>
                    <div class="data-contact d-flex align-self-stretch">
                        <div class="title-icon">support<i class="icon-support icon-address"></i></div>
                        <div class="content-data-contact">
                            <div class="support">{{__('front.Call Customer Services:')}}</div>
                            <div class="phone-support">{{Setting::get('phone')}}</div>
                        </div>
                    </div>
                    <div class="data-contact d-flex align-self-stretch">
                        <div class="title-icon">info contact<i class="icon-info-contact icon-address"></i></div>
                        <div class="content-data-contact">
                            <div class="info-contact">{{__('front.Contact info :')}}</div>
                            <div class="content-info-contact">{{Setting::get('Address')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
            <div class="block">
                <div class="title_block">
                    {{__('front.CORPORATE INFO')}}
                </div>
                <div class="block_content">
                    <ul>
                        <li><a href="{{route('AboutUs')}}">{{__('front.Who We Are ?')}}</a></li>
                        <li><a href="#">{{__('front.Privacy Policy')}}</a></li>
                        <li><a href="#">{{__('front.Terms of Use')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
            <div class="block">
                <div class="title_block">
                    {{__('front.MY ACCOUNT')}}
                </div>
                <div class="block_content">
                    <ul>
                        <li><a href="#">{{__('front.Privacy Policy')}}</a></li>
                        <li><a href="{{'profile'}}">{{__('front.MY ACCOUNT')}}</a></li>
                        <li><a href="#search_input">{{__('front.Advanced Search')}}</a></li>
                        <li><a href="{{route('contactUS')}}">{{__('front.Contact Us')}}</a></li>
                        <li><a href="{{route('wishlist.index')}}">{{__('front.My Wishlist')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nov-html col-xl-2 col-lg-2 col-md-2">
            <div class="block">
                <div class="title_block">
                    NEED HELP
                </div>
                <div class="block_content">
                    <ul>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">{{__('front.Privacy Policy')}}</a></li>
                        <li><a href="#">Payments & Returns</a></li>
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Product Care</a></li>
                        <li><a href="#">FAQ's</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
