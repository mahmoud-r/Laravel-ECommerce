@if(!empty($products))
    @foreach($products as $product)
            <li>
                <a href="{{route('product',$product->id)}}">

                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <img width="100%" src="{{URL('images/product').'/'.$product->images[0]->name}}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>
                            {{ Str::words($product->name,20) }}
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3" style="color: #21a2fd; "  >
                        {{$product->price}}
                    </div>
                </div>
                </a>

            </li>

    @endforeach
@endif
