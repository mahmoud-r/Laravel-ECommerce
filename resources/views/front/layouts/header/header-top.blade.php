<div class="header-top hidden-sm-down">
    <div class="container">
        <div class="row">
            <div class="header-top-left col-lg-6 col-md-8 d-flex justify-content-start align-items-center">

                <div id="_desktop_language_selector" class="language-selector groups-selector hidden-sm-down language-selector-dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="main">
                        <span class="expand-more"><img class="img-fluid" src="{{URL('design/front/images/flags/'). '/'.LaravelLocalization::getCurrentLocale().'.jpg'}}" alt="English" width="16" height="11"/></span>
                    </div>
                    <div class="language-list dropdown-menu">
                        <div class="language-list-content text-left">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="language-item ">
                                    <div  class="current"  >
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <img class="img-fluid" src="{{URL('design/front/images/flags/'). '/'.$localeCode.'.jpg'}}" alt="{{$localeCode =='ar' ?'عربي':'English'}}" width="16" height="11"/>
                                            <span>
                                                @if($localeCode == 'ar')
                                                    اللغة العربية
                                                @else
                                                    English
                                                @endif

                                            </span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="detail-email d-flex align-items-center justify-content-center">
                    <i class="icon-email"></i>
                    <p>Email :  </p>
                    <span>
              {{Setting::get('default_email_address')}}
            </span>
                </div>
                <div class="detail-call d-flex align-items-center justify-content-center">
                    <i class="icon-deal"></i>
                    <p>{{__('front.Today Deals')}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 d-flex justify-content-end align-items-center header-top-right">
                @guest
                    <div class="register-out">
                        <i class="zmdi zmdi-account"></i>
                        <a class="register" href="{{route('register')}}" data-link-action="display-register-form">
                            {{__('front.Register')}}
                        </a>
                        <span class="or-text">{{__('front.or')}}</span>
                        <a class="login" href="{{route('login')}}" rel="nofollow" title="Log in to your customer account">{{__('front.Sign in')}}</a>
                    </div>

                @endguest
                    <div class="register-sign">
                        @auth
                            <a class="account" href="{{route('profile')}}" title="View my customer account" rel="nofollow"><span>{{Auth::user()->name}}</span></a>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout" style="border:none; background: none;  color: inherit; font: inherit;cursor: pointer;"   rel="nofollow" title="Log me out">{{__('front.Sign out')}}</button>
                            </form>

                        @endauth
                    </div>
            </div>

        </div>
    </div>
</div>
