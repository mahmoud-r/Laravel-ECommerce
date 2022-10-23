
@section('style')
@endsection

@section('title')
{{--{{__('front.HOME')}}--}}
@endsection

@section('description')

@endsection

@section('content')
    @include('front.layouts.home.displayTop')

    <section id="content" class="page-home pagehome-four">
        <div class="container">
            <div class="row">
                @include('front.layouts.home.productTab')
                @include('front.layouts.home.categore1')
{{--                @include('front.layouts.home.bestsellers')--}}
                @include('front.layouts.home.categore2')

                <div class="nov-row policy-home col-lg-12 col-xs-12" >
                    <div class="nov-row-wrap row"><div class="nov-html col-xl-4 col-lg-4 col-md-4">
                            <div class="block">
                                <div class="block_content">
                                    <div class="policy-row"><i class="noviconpolicy noviconpolicy-1"></i>
                                        <div class="policy-content">
                                            <div class="policy-name">Free Delivery From $ 250</div>
                                            <div class="policy-des">Sed ut perspiciatis unde omnis iste</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nov-html col-xl-4 col-lg-4 col-md-4">
                            <div class="block">
                                <div class="block_content">
                                    <div class="policy-row"><i class="noviconpolicy noviconpolicy-2"></i>
                                        <div class="policy-content">
                                            <div class="policy-name">Money Back Guarantee</div>
                                            <div class="policy-des">Sed ut perspiciatis unde omnis iste natus</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nov-html col-xl-4 col-lg-4 col-md-4">
                            <div class="block">
                                <div class="block_content">
                                    <div class="policy-row"><i class="noviconpolicy noviconpolicy-3"></i>
                                        <div class="policy-content">
                                            <div class="policy-name">Authenticity 100% guaranteed</div>
                                            <div class="policy-des">Sed ut perspiciatis unde omnis iste natus</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                @include('front.layouts.home.trendingnow')

            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection

@include('front.master')

