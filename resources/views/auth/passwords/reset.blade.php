

@section('style')
@endsection

@section('title')
    {{ __('front.Reset Password') }}
@endsection

@section('description')

@endsection
@section('nav')
    @include('front.layouts.header.nav')
@endsection
@section('content')
    <section id="content" class="page-content">


        <section class="login-form">
            <h3 class="row justify-content-center  pb-5 ">{{__('front.Reset Password')}}</h3>
            <form method="POST"  action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('front.Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="{{__('front.Enter Your Email')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('front.Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" placeholder="{{__('front.Password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('front.Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password"  placeholder=" {{ __('front.Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-6 offset-md-4 " style="margin-top: 20px">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </section>
    </section>


@endsection

@section('script')

@endsection


@include('front.master')
