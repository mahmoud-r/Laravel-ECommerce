

@section('style')
@endsection

@section('title')
   {{__('front.Login')}}
@endsection

@section('description')

@endsection
@section('nav')
    @include('front.layouts.header.nav')
@endsection
@section('content')


    <section id="content" class="page-content">


        <section class="login-form">

            <form id="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <section>

                    <div class="form-group row no-gutters">
                        <label class="col-md-2 form-control-label mb-xs-5 required" for="email" >
                            {{ __('front.Email Address') }} :
                        </label>
                        <div class="col-md-6">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
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
                            {{ __('front.Password') }}
                        </label>
                        <div class="col-md-6">

                            <div class="input-group js-parent-focus">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                @enderror

                            </div>


                        </div>

                        <div class="col-md-4 form-control-comment right">
                        </div>

                    </div>




                    <div class="row no-gutters">
                        <div class="col-md-10 offset-md-2">
                            <div class="forgot-password">
                                <a href="{{route('password.request')}}" rel="nofollow">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>
                    </div>



                </section>


                <footer class="form-footer clearfix ">
                    <div class="row no-gutters ">
                        <div class="col-md-10 offset-md-2  " style="margin-top: 10px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-md-10 offset-md-2 mt-10 mb-10">
                            <input type="hidden" name="submitLogin" value="1">

                            <button class="btn btn-primary " data-link-action="sign-in" type="submit" class="form-control-submit">
                                Sign in
                            </button>

                        </div>
                    </div>
                </footer>


            </form>


        </section>



        <div class="row no-gutters">
            <div class="col-md-10 offset-md-2">
                <div class="no-account">
                    <a href="{{route('register')}}" data-link-action="display-register-form">
                        No account? Create one here
                    </a>
                </div>
            </div>
        </div>


    </section>

@endsection

@section('script')

@endsection


@include('front.master')
