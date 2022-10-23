

@section('style')
@endsection

@section('title')
    {{ __('front.Verify Your Email Address') }}
@endsection

@section('description')

@endsection
@section('nav')
    @include('front.layouts.header.nav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('front.Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('front.A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('front.Before proceeding, please check your email for a verification link.') }}
                        {{ __('front.If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('front.click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection


@include('front.master')


