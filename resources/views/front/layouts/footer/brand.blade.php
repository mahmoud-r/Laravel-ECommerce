<div class="nov-row-wrap row">
    <div class="nov-manufacture col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="block" >
            <div class="block_content">
                <div id="manufacture283037401" class="owl-carousel owl-theme owl-loaded owl-drag" data-autoplay="true" data-autoplaytimeout="6000" data-loop="true" data-dots="false" data-nav="false" data-margin="30" data-items="6" data-items_large="2" data-items_tablet="3" data-items_mobile="2">
                    @foreach($Brands as $brand)
                        @if(!empty($brand->image))
                            <div class="item">
                                <div class="logo-manu">
                                    <a href="{{route('GetProductByBrand',$brand->name)}}" title="view products">
                                        <img class="img-fluid" src="{{URL('images/brand').'/'.$brand->image}}" alt="{{$brand->name}}"/></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
