<div class="nov-row footer-top " data-nov-full-width="true">
    <div class="nov-row-wrap row">
        <div class="nov-modules col-lg-12 col-md-12 newsletter"><div class="block nov-wrap">
                <div class="title_block">{{__('front.SIGN UP TO NEWSLETTER')}}</div><div class="block_newsletter">
                    <form action="{{'/register'}}" method="get">

                        <div class="input-group">
                            <input type="text" class="form-control" name="email" value="" placeholder="{{__('front.Enter Your Email')}}">
                            <span class="input-group-btn">
                                 <button class="btn btn-secondary effect-btn"  type="submit">
                                   <span>{{__('front.subscribe')}}</span>
                                 </button>
                             </span>
                        </div>
                    </form>
                </div>
                <div class="social-content">
                    <div class="title_block">
                        {{__('front.Follow us on')}}
                    </div>
                    <div id="social_block">
                        <div class="social">
                            <ul class="list-inline mb-0 justify-content-end">
                                <li class="list-inline-item mb-0"><a href="{{Setting::get('social_facebook')}}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li class="list-inline-item mb-0"><a href="{{Setting::get('social_twitter')}}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li class="list-inline-item mb-0"><a href="{{Setting::get('social_instagram')}}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
