<div id="mobile_top_menu_wrapper" class="hidden-md-up"`>
    <div class="content">
        <div id="_mobile_verticalmenu"></div>
    </div>
</div>


<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content">
            <div id="_mobile_top_menu" class="js-top-menu"></div>
        </div>
    </div>
</div>
<div id="mobile-blockcart" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Cart</div>
            <div class="close-box">Close</div>
        </div>
        <div id="_mobile_cart" class="box-content"></div>
    </div>
</div>
<div id="mobile-pageaccount" class="mobile-boxpage d-flex hidden-md-up" data-titlebox-parent="Account">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="back-box">Back</div>
            <div class="title-box">Account</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content d-flex justify-content-center align-items-center text-center">
            <div>
                <div id="_mobile_account_list">
                    <div class="account-list-content">
                        @guest()
                        <div>
                            <a class="login" href="{{route('login')}}" rel="nofollow" title="Log in to your customer account"><i class="fa fa-sign-in"></i>Sign in</a>
                        </div>
                        <div>
                            <a class="register" href="{{route('register')}}" rel="nofollow" title="Register Account"><i class="fa fa-user"></i>Register Account</a>
                        </div>

                        @endguest
                        @auth
                            <div>
                                <a class="login" href="{{route('profile')}}" rel="nofollow" title="My Account"><i class="fa fa-sign-in"></i>My Account</a>
                            </div>
                            <div>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="login" style="border:none; background: none;  color: inherit; font: inherit;cursor: pointer;"   rel="nofollow" title="Log me out">Sign out</button>
                                </form>
                            </div>
                                <div>
                                    <a class="check-out" href="{{route('order')}}" rel="nofollow" title="Checkout"><i class="material-icons">check_circle</i>Checkout</a>
                                </div>
                                <div class="link_wishlist">
                                    <a href="{{route('wishlist.index')}}" title="My Wishlists">
                                        <i class="fa fa-heart"></i>My Wishlists
                                    </a>
                                </div>
                            @endauth
                    </div>
                </div>
                <div class="links-language" data-target="#box-language" data-titlebox="Language"><span>Language</span><i class="zmdi zmdi-arrow-right"></i></div>
            </div>
        </div>

        <div id="box-language" class="box-content d-flex">
            <div class="w-100">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <div class="item-language  {{$localeCode == LaravelLocalization::getCurrentLocale() ?'current' :'' }}">
                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="d-flex align-items-center">
                        <img class="img-fluid mr-2" src="{{URL('design/front/images/flags/'). '/'.$localeCode.'.jpg'}}" alt="{{$localeCode =='ar' ?'عربي':'English'}}" width="16" height="11" />
                        <span>
                            @if($localeCode == 'ar')
                                اللغة العربية
                            @else
                                English
                            @endif
                        </span>
                    </a>
                </div>

                @endforeach
            </div>
        </div>

    </div>
</div>


<div id="stickymenu_bottom_mobile" class="d-flex align-items-center justify-content-center hidden-md-up text-center">
    <div class="stickymenu-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i><span>Home</span></a></div>
    <div class="stickymenu-item"><a href="#search_input" class="js-btn-search"><i class="zmdi zmdi-search"></i><span>Search</span></a></div>
    <div class="stickymenu-item"><div id="_mobile_cart_bottom" class="nov-toggle-page" data-target="#mobile-blockcart"></div></div>
    <div class="stickymenu-item"><a href="{{route('wishlist.index')}}"><i class="zmdi zmdi-favorite-outline"></i><span>Wishlist</span></a></div>
    <div class="stickymenu-item"><a href="#" class="nov-toggle-page" data-target="#mobile-pageaccount"><i class="zmdi zmdi-account-o"></i><span>Account</span></a></div>
</div>

