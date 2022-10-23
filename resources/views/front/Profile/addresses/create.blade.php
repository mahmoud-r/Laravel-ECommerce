

@section('style')
@endsection

@section('title')
    {{__('front.Addresses')}}
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
                        <a itemprop="item" href="{{route('address.index')}}">
                            <span itemprop="name">{{__('front.Addresses')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')

    <section id="content" class="page-content">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">{{__('front.Create  New Address')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- form start -->
                    <form action="{{route('address.store')}}" method="post" >
                        @csrf

                        <div class="card-body" style="padding: 15px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{__('front.First Name :')}}
                                        </label>
                                        <div class="col-md-6">

                                            <input
                                                class="form-control"
                                                name="first_name"
                                                type="text"
                                                required
                                                autocomplete="name" autofocus
                                                placeholder="{{__('front.First Name')}}"
                                                value="{{old('first_name')}}"
                                                @error('first_name') is-invalid @enderror">

                                        </div>

                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>


                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{__('front.Last Name :')}}
                                        </label>
                                        <div class="col-md-6">

                                            <input
                                                class="form-control"
                                                name="last_name"
                                                type="text"
                                                required
                                                placeholder="{{__('front.Last Name')}}"
                                                value="{{old('last_name')}}"
                                                @error('last_name') is-invalid @enderror">

                                        </div>

                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5">
                                            {{__('front.City :')}}
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input
                                                    class="form-control js-child-focus js-visible-password"
                                                    name="City"
                                                    type="text"
                                                    pattern=".{5,}"
                                                    placeholder="{{__('front.City')}}"
                                                    required
                                                    value="{{old('City')}}"
                                                    @error('City') is-invalid @enderror" >


                                            </div>


                                        </div>


                                    </div>

                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5">
                                            {{__('front.Address :')}}
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input
                                                    class="form-control js-child-focus js-visible-password"
                                                    name="address"
                                                    type="text"
                                                    pattern=".{5,}"
                                                    placeholder="{{__('front.Address')}}"
                                                    value="{{old('address')}}"
                                                    required
                                                    @error('address') is-invalid @enderror" >


                                            </div>


                                        </div>


                                    </div>


                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5">
                                            {{__('front.Phone : ')}}
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input
                                                    class="form-control js-child-focus js-visible-password"
                                                    name="phone"
                                                    type="text"
                                                    pattern=".{5,}"
                                                    placeholder="{{__('front.Phone')}}"
                                                    value="{{old('Phone')}}"
                                                    required
                                                    @error('address') is-invalid @enderror" >


                                            </div>


                                        </div>


                                    </div>

                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5">
                                            {{__('front.Other Phone : ')}}
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input
                                                    class="form-control js-child-focus js-visible-password"
                                                    name="other_phone"
                                                    type="text"
                                                    pattern=".{5,}"
                                                    value="{{old('other_phone')}}"
                                                    placeholder="{{__('front.Other Phone')}}"
                                                    @error('other_phone') is-invalid @enderror" >


                                            </div>


                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                            {{__('front.(Optional)')}}
                                        </div>

                                    </div>




                                </div>

                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary w-100">{{__('front.Create')}} </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <footer class="page-footer mt-10">



        <a href="{{route('address.index')}}" class="account-link btn btn-primary">
            <i class="material-icons">&#xE5CB;</i>
            {{__('front.Back to your Addresses')}}
        </a>
        <a href="{{route('home')}}" class="account-link btn btn-secondary">
            <i class="material-icons">&#xE88A;</i>
            {{__('front.Home')}}
        </a>



    </footer>

@endsection

@section('script')

@endsection


@include('front.master')
