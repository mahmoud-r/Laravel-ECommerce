<div id="displayTop" class="displaytopfour">
    <div class="container">
        <div class="row">
            <div class="nov-row spacing-10 col-lg-12 col-xs-12">
                <div class="nov-row-wrap row">
                    <div id="nov-slider" class="slider-wrapper theme-default col-xl-8 col-lg-8 col-md-8 mt-5"
                         data-effect="random"
                         data-slices="15"
                         data-animSpeed="500"
                         data-pauseTime="10000"
                         data-startSlide="0"
                         data-directionnav="false"
                         data-controlNav="true"
                         data-controlNavThumbs="false"
                         data-pauseOnHover="true"
                         data-manualAdvance="false"
                         data-randomStart="false">
                        <div class="nov_preload">
                            <div class="process-loading active">
                                <div class="loader">
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                </div>
                            </div>
                        </div>
                        <div class="nivoSlider">
                            @forelse($slider_images as $slider)
                                <a href="{{$slider->link}}">
                                    <img
                                        src="{{URL('images/slider','/'.$slider->image)}}"
                                        alt="" title="#htmlcaption_40"/>
                                </a>
                            @empty
                            @endforelse


                        </div>
                        <div id="htmlcaption_40" class="nivo-html-caption">
                            <div class="nov-slider-ct">
                                <div class="nov-center slider-center">
                                    <div class="nov-title effect-0">
                                        Slider Home 4 01
                                    </div>
                                    <div class="nov-description effect-0">
                                        <p>Slider Home 4 01</p>
                                    </div>
                                    <div class="nov-html effect-0">
                                        <p>Slider Home 4 01</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="htmlcaption_41" class="nivo-html-caption">
                            <div class="nov-slider-ct">
                                <div class="nov-center slider-center">
                                    <div class="nov-title effect-0">
                                        Slider Home 4 02
                                    </div>
                                    <div class="nov-description effect-0">
                                        <p>Slider Home 4 02</p>
                                    </div>
                                    <div class="nov-html effect-0">
                                        <p>Slider Home 4 02</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="htmlcaption_45" class="nivo-html-caption">
                            <div class="nov-slider-ct">
                                <div class="nov-center slider-none">
                                    <div class="nov-title effect-0">
                                        Slider Home 4 03
                                    </div>
                                    <div class="nov-description effect-0">
                                        <p>Slider Home 4 03</p>
                                    </div>
                                    <div class="nov-html effect-0">
                                        <p>Slider Home 4 03</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nov-html col-xl-4 col-lg-4 col-md-4">
                        <div class="block">
                            <div class="block_content">
                                <div class="nov-row-wrap row">
                                    <div class="nov-image col-lg-12 col-md-12">
                                        <div class="block">
                                            <div class="block_content">
                                                <div class="effect">
                                                    <a href="{{$sliderImagesRight[0]->link}}">
                                                        <img class="img-fluid"
                                                             src="{{URL('images/slider','/'.$sliderImagesRight[0]->image)}}"
                                                             alt="banner 4-1"
                                                             title="banner 4-1"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nov-row-wrap row">
                                    <div class="nov-image col-lg-12 col-md-12">
                                        <div class="block">
                                            <div class="block_content">
                                                <div class="effect">
                                                    <a href="{{$sliderImagesRight[1]->link}}">
                                                        <img class="img-fluid"
                                                             src="{{URL('images/slider','/'.$sliderImagesRight[1]->image)}}"
                                                             alt="banner 4-2"
                                                             title="banner 4-2"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
