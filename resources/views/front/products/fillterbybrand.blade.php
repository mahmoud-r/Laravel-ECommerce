<div id="left-column" class="sidebar col-xs-12 col-sm-4 col-md-2">
    <div class="nov-modules col-lg-12 col-md-12 no-padding">
        <div class="block nov-wrap">
            <div class="block-categories block">
                <ul class="category-top-menu">
                    <li class="title_block "  >
                        <a href="#" style="color: #2d9ae8">{{__('front.Filter BY :')}}</a>
                    </li>
                    <li>
                        <form id="filter">
                            <ul class="category-sub-menu ">
                                <li data-depth="0">
                                    <h4 style="cursor: pointer" class="title_block" data-toggle="collapse" data-target="#exCollapsingNavbar3">{{__('front.sub Categories')}}</h4>
                                    <div class="navbar-toggler collapse-icons" data-toggle="collapse" data-target="#exCollapsingNavbar3">
                                        <i class="material-icons add">add</i>
                                        <i class="material-icons remove">remove</i>
                                    </div>
                                    <div class="collapse" id="exCollapsingNavbar3">
                                        <ul class="category-sub-menu" style="list-style: none">
                                            @foreach($sub_Categories as $item)
                                                <li data-depth="1">
                                                    <input type="checkbox" value="{{$item->id}}" name="subcategory[]"  id="cat{{$item->id}}" class="category-sub-link filter"
                                                        {{$item->name == $name ? 'checked' :''}}>
                                                    <label for="cat{{$item->id}}">{{$item->name}}</label>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                            <ul class="category-sub-menu ">
                                <li data-depth="0">
                                    <h4 style="cursor: pointer" class="title_block" data-toggle="collapse" data-target="#brands">{{__('front.Brand')}}</h4>
                                    <div class="navbar-toggler collapse-icons" data-toggle="collapse" data-target="#brands">
                                        <i class="material-icons add">add</i>
                                        <i class="material-icons remove">remove</i>
                                    </div>
                                    <div class="collapse" id="brands">
                                        <ul class="category-sub-menu" style="list-style: none">
                                                <li data-depth="1">
                                                    <input type="hidden"  checked value="{{$brand->id}}"  name="brand[]" id="brand" class="category-sub-link filter">
                                                    <label for="brand">{{$brand->name}}</label>
                                                </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                            <ul class="category-sub-menu ">
                                <li data-depth="0">
                                    <h4 style="cursor: pointer" class="title_block" data-toggle="collapse" data-target="#price">{{__('front.price')}}</h4>
                                    <div class="navbar-toggler collapse-icons" data-toggle="collapse" data-target="#price">
                                        <i class="material-icons add">add</i>
                                        <i class="material-icons remove">remove</i>
                                    </div>
                                    <div class="collapse" id="price">
                                        <div class="form-group">
                                            <label class="form-control-label">{{__('front.min:')}}</label>
                                            <input type="number" name="min_price" class="form-control" autofocus value="{{$min_price}}" />
                                            <label class="form-control-label">{{__('front.max:')}}</label>
                                            <input type="number" name="max_price" class="form-control" value="{{$max_price}}" />
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <a href="#" class="btn btn-secondary effect-btn" style="border-radius: 21px;color: white" id="search_filter">{{__('front.Search')}}</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</div>
@section('script')
    <script>
        $(function (){
            $('#filter').change(function (e){
                e.preventDefault();
                var form = $(this);
                $('#data').html('<img src="{{Url('images/loading.svg')}}" style="height: 200px" >')
                $.get('{{route('filter')}}', form.serialize() , function(markup)
                {
                    $('#data').html(markup);
                });
            })
            $('#search_filter').click(function (e){
                e.preventDefault();
                var form = $('#filter');
                $.get('{{route('filter')}}', form.serialize() , function(markup)
                {
                    $('#data').html(markup);
                });
            })
            // $('.sort_by').click(function (e){
            //     e.preventDefault();
            //     var Url = $(this).attr('href');
            //     // var form = $('#filter');
            //     $.get(Url , function(markup)
            //     {
            //         $('#data').html(markup);
            //     });
            // })

        })



    </script>

@endsection
