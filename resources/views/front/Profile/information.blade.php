

@section('style')
@endsection

@section('title')
    {{__('front.Information')}}
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
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('information')}}">
                            <span itemprop="name">{{__('front.Information')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')
<div id="identity">
    <div class="page-header">
        <h1 class="page-title hidden-xs-up">
            Your personal information
        </h1>
    </div>




    <section id="content" class="page-content">



        <aside id="notifications">
            <div class="container">



            </div>
        </aside>

        <form action="{{route('information.update')}}" id="customer-form" class="js-customer-form" method="post">
           @csrf
            <section>

                <div class="form-group row no-gutters">
                    <label class="col-md-2 form-control-label mb-xs-5 required">
                        {{__('front.Name :')}}
                    </label>
                    <div class="col-md-6">

                        <input
                            class="form-control"
                            name="name"
                            type="text"
                            value="{{Auth::user()->name}}"
                            required
                            autocomplete="name" autofocus
                            @error('name') is-invalid @enderror">




                    </div>

                    <div class="col-md-4 form-control-comment right">
                    </div>
                </div>


                <div class="form-group row no-gutters">
                    <label class="col-md-2 form-control-label mb-xs-5 required">
                        {{__('front.Email :')}}
                    </label>
                    <div class="col-md-6">

                        <input
                            class="form-control"
                            name="email"
                            type="email"
                            value="{{Auth::user()->email}}"
                            required
                            @error('email') is-invalid @enderror">



                    </div>

                    <div class="col-md-4 form-control-comment right">
                    </div>
                </div>




                <div class="form-group row no-gutters">
                    <label class="col-md-2 form-control-label mb-xs-5 required">
                        {{__('front.Password :')}}
                    </label>
                    <div class="col-md-6">

                        <div class="input-group js-parent-focus">
                            <input
                                class="form-control js-child-focus js-visible-password"
                                name="password"
                                type="password"
                                value=""
                                pattern=".{5,}"
                                required
                                @error('password') is-invalid @enderror">


                            <span class="input-group-btn">
                                <button
                                    class="btn"
                                    type="button"
                                    data-action="show-password"
                                    data-text-show="Show"
                                    data-text-hide="Hide"
                                >
                                 {{__('front.Show')}}
                                </button>
                              </span>
                        </div>


                    </div>

                    <div class="col-md-4 form-control-comment right">
                    </div>
                </div>




                <div class="form-group row no-gutters">
                    <label class="col-md-2 form-control-label mb-xs-5">
                        {{__('front.New password :')}}
                    </label>
                    <div class="col-md-6">

                        <div class="input-group js-parent-focus">
                            <input
                                class="form-control js-child-focus js-visible-password"
                                name="new_password"
                                type="password"
                                value=""
                                pattern=".{5,}"
                                @error('new_password') is-invalid @enderror" >

                            <span class="input-group-btn">
                                <button
                                    class="btn"
                                    type="button"
                                    data-action="show-password"
                                    data-text-show="Show"
                                    data-text-hide="Hide"
                                >{{__('front.Show')}}</button>
                              </span>
                        </div>


                    </div>

                    <div class="col-md-4 form-control-comment right">
                        {{__('front.(Optional)')}}
                    </div>

                </div>

                        <div class="form-group row no-gutters">
                    <label class="col-md-2 form-control-label mb-xs-5">
                       {{__('front.password Confirmation :')}}
                    </label>
                    <div class="col-md-6">

                        <div class="input-group js-parent-focus">
                            <input
                                class="form-control js-child-focus js-visible-password"
                                name="new_password_confirmation"
                                type="password"
                                value=""
                                pattern=".{5,}"
                                @error('password_confirmation') is-invalid @enderror" >

                            <span class="input-group-btn">
                                <button
                                    class="btn"
                                    type="button"
                                    data-action="show-password"
                                    data-text-show="Show"
                                    data-text-hide="Hide"
                                >{{__('front.Show')}}</button>
                              </span>

                        </div>


                    </div>

                    <div class="col-md-4 form-control-comment right">
                        {{__('front.(Optional)')}}
                    </div>
                </div>


            </section>


            <footer class="form-footer clearfix">
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-2">
                        <button class="btn btn-primary form-control-submit mb-20" data-link-action="save-customer" type="submit">
                            {{__('front.Update')}}
                        </button>

                    </div>
                </div>
            </footer>


        </form>

    </section>
    <footer class="page-footer">



        <a href="{{route('profile')}}" class="account-link btn btn-primary">
            <i class="material-icons">&#xE5CB;</i>
            {{__('front.Back to your account')}}
        </a>
        <a href="{{route('home')}}" class="account-link btn btn-secondary">
            <i class="material-icons">&#xE88A;</i>
            {{__('front.Home')}}
        </a>



    </footer>



</div>
@endsection

@section('script')

@endsection


@include('front.master')
