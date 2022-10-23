

@section('style')
@endsection

@section('title')
    {{ __('front.Register') }}
@endsection

@section('description')

@endsection
@section('nav')
    @include('front.layouts.header.nav')
@endsection
@section('content')

    <section id="content" class="page-content">



        <section class="register-form">
            <p>Already have an account? <a href="{{route('login')}}">Log in instead!</a></p>




            <form action="{{ route('register') }}" id="customer-form" class="js-customer-form" method="post">
                @csrf
                <section>
                    <div class="form-group row no-gutters">
                        <label class="col-md-2 form-control-label mb-xs-5 required">
                            {{ __('front.Name') }}
                        </label>
                        <div class="col-md-6">

                            <input id="name" placeholder="Enter Your name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-control-comment right">
                        </div>
                    </div>





                    <div class="form-group row no-gutters">
                        <label class="col-md-2 form-control-label mb-xs-5 required">
                            {{ __('front.Email Address') }}
                        </label>
                        <div class="col-md-6">

                            <input id="email" placeholder="{{__('front.Enter Your Email')}}" type="email" value="{{ request('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-md-4 form-control-comment right">
                        </div>
                    </div>




                    <div class="form-group row no-gutters">
                        <label class="col-md-2 form-control-label mb-xs-5 required">
                            {{ __('front.Password') }}
                        </label>
                        <div class="col-md-6">
                                <input id="password" placeholder="{{__('front.Password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                        </div>



                        <div class="col-md-4 form-control-comment right">
                        </div>
                    </div>

                 <div class="form-group row no-gutters">
                        <label class="col-md-2 form-control-label mb-xs-5 required">
                            {{ __('front.Confirm Password') }}
                        </label>
                        <div class="col-md-6">

                            <div class="input-group js-parent-focus">
                                <input id="password-confirm" placeholder=" {{ __('front.Confirm Password') }}"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                            </div>


                        </div>

                        <div class="col-md-4 form-control-comment right">
                        </div>
                    </div>





                </section>


                <footer class="form-footer clearfix">
                    <div class="row no-gutters">
                        <div class="col-md-10 offset-md-2">

                            <button class="btn btn-primary form-control-submit mb-20" data-link-action="save-customer" type="submit">
                                Register
                            </button>

                        </div>
                    </div>
                </footer>


            </form>


        </section>


    </section>


@endsection

@section('script')

@endsection


@include('front.master')
