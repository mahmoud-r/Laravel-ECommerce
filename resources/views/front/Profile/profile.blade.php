@section('style')
@endsection

@section('title')
{{__('front.MY ACCOUNT')}}
@endsection

@section('description')

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
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('profile')}}">
                            <span itemprop="name">{{__('front.MY ACCOUNT')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')

    <div id="my-account">
        <div class="page-header">
            <h1 class="page-title hidden-xs-up">
                Your account
            </h1>
        </div>


        <section id="content" class="page-content">


            <aside id="notifications">
                <div class="container">


                </div>
            </aside>


            <div class="links">

                <a id="identity-link" href="{{route('information')}}">
                 <span class="link-item">
                      <i class="material-icons">&#xE853;</i>
                  <span>{{__('front.Information')}}</span>
                 </span>
                </a>

                <a id="addresses-link" href="{{route('address.index')}}">
                  <span class="link-item">
                     <i class="material-icons">&#xE56A;</i>
                    <span>{{__('front.Addresses')}}</span>
                  </span>
                </a>

                <a id="history-link" href="{{route('profile.orders')}}">
                  <span class="link-item">
                      <i class="material-icons">&#xE916;</i>
                    <span>{{__('front.Order history and details')}}</span>
                  </span>
                </a>


                <!-- MODULE WishList -->
                <div class="link_wishlist">
                    <a href="{{route('wishlist.index')}}" title="My Wishlists">
                        <i class="fa fa-heart"></i>{{__('front.My Wishlist')}}
                    </a>
                </div>
                <!-- END : MODULE WishList -->

                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            style="border:none; background: none;  color: inherit; font: inherit;cursor: pointer;"
                            rel="nofollow" title="Log me out">
                        <a href="#" rel="nofollow" class="a-account">
                            <span class="link-item">
                                 <i class="zmdi zmdi-close-circle"></i>
                              <span>{{__('front.Sign out')}}</span>
                            </span>
                        </a>
                    </button>

                </form>
            </div>

        </section>

    </div>

@endsection

@section('script')

@endsection


@include('front.master')
