@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/summernote/summernote-bs4.min.css">
{{--    //dropzone css--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

<style>
    .hovereffect {
        width:100%;
        height:100%;
        float:left;
        overflow:hidden;
        position:relative;
        text-align:center;
        cursor:default;
    }

    .hovereffect .overlay {
        width:100%;
        height:100%;
        position:absolute;
        overflow:hidden;
        top:0;
        left:0;
        opacity:0;
        background-color:rgba(0,0,0,0.5);
        -webkit-transition:all .4s ease-in-out;
        transition:all .4s ease-in-out
    }

    .hovereffect img {
        display:block;
        position:relative;
        -webkit-transition:all .4s linear;
        transition:all .4s linear;
    }

    .hovereffect h2 {
        text-transform:uppercase;
        color:#fff;
        text-align:center;
        position:relative;
        font-size:17px;
        background:rgba(0,0,0,0.6);
        -webkit-transform:translatey(-100px);
        -ms-transform:translatey(-100px);
        transform:translatey(-100px);
        -webkit-transition:all .2s ease-in-out;
        transition:all .2s ease-in-out;
        padding:10px;
    }

    .hovereffect a.info {
        text-decoration:none;
        display:inline-block;
        text-transform:uppercase;
        color:#fff;
        border:1px solid #fff;
        background-color:transparent;
        opacity:0;
        filter:alpha(opacity=0);
        -webkit-transition:all .2s ease-in-out;
        transition:all .2s ease-in-out;
        margin:50px 0 0;
        padding:7px 14px;
    }

    .hovereffect a.info:hover {
        box-shadow:0 0 5px #fff;
    }

    .hovereffect:hover img {
        -ms-transform:scale(1.2);
        -webkit-transform:scale(1.2);
        transform:scale(1.2);
    }

    .hovereffect:hover .overlay {
        opacity:1;
        filter:alpha(opacity=100);
    }

    .hovereffect:hover h2,.hovereffect:hover a.info {
        opacity:1;
        filter:alpha(opacity=100);
        -ms-transform:translatey(0);
        -webkit-transform:translatey(0);
        transform:translatey(0);
    }

    .hovereffect:hover a.info {
        -webkit-transition-delay:.2s;
        transition-delay:.2s;
    }
</style>
@endsection

@section('tittle')

@endsection

@section('page')
    admin
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('product.index')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('admin.edit_product')}}</h3>
        </div>
        <!-- /.card-header -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="productname">{{__('admin.product_name')}} </label>
                                    <input type="text" name="name" class="form-control" id="productname" value="{{$product->name}}" placeholder="{{__('admin.product_name')}}" @error('name') is-invalid @enderror >
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productname">{{__('admin.quantity')}} </label>
                                    <input type="number" name="quantity" class="form-control" id="productname" value="{{$product->quantity}}" placeholder="{{__('admin.quantity')}}" @error('name') is-invalid @enderror >
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="productname">{{__('admin.price')}} </label>
                                    <input type="text" name="price" class="form-control" id="productname" value="{{$product->price}}" placeholder="{{__('admin.price')}}" @error('name') is-invalid @enderror >
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('admin.categories')}}</label>
                                    <select class="form-control select2bs4" name="Categorie_id" id="Categorie" value="{{$product->Categorie_id}}" style="width: 100%;" @error('Categorie_id') is-invalid @enderror >

                                        <option selected="selected" value="null" disabled>{{__('admin.Choose_a_category')}}</option>

                                        @forelse($categories as $categorie)
                                            <option value="{{$categorie->id}}" {{$product->Categorie_id == $categorie->id ? 'selected' : ''}}>{{$categorie->name}}</option>
                                        @empty
                                            <option selected="selected" value="null" disabled> {{__('admin.please_add_categories')}}</option>
                                        @endforelse
                                    </select>
                                    @error('Categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>{{__('admin.sub_categories')}}</label>
                                    <select class="form-control select2bs4" name="sub_Categorie_id"
                                            value="{{$product->sub_Categorie_id}}"
                                            style="width: 100%;"
                                            @error('sub_Categorie_id') is-invalid @enderror >

                                        <option value="{{$product->sub_Categorie_id}}" >{{$product->sub_Categorie->name}}</option>

                                    </select>
                                    @error('sub_Categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{__('admin.brand')}}</label>
                                    <select class="form-control select2bs4" name="brand_id" value="{{$product->brand_id}}" style="width: 100%;" @error('brand_id') is-invalid @enderror >


                                        @forelse($brands as $brand)

                                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @empty
                                            <option selected="selected" value="null" disabled> {{__('admin.please_add_brand')}}</option>
                                        @endforelse
                                    </select>
                                    @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-12">
                                <textarea id="summernote" name="description"  @error('brand_id') is-invalid @enderror >
                                    {{$product->description}}
                                  </textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($product->images as $image)
                                        <div class="col-lg-3 " >
                                            <div class="hovereffect" id="{{$image->id}}">
                                                <img  src="{{URl('images/product/').'/'.$image->name}}"  style="width: 100%;height: 100%" class="img-responsive">
                                                <div class="overlay">
{{--                                                    <a class="info" href="#">link here</a>--}}
{{--                                                    <form   method="post" class="d-inline">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('delete')--}}
                                                        <a  id="deleteimage" data-id="{{ $image->id}}" class="btn btn-danger btn-sm   info "><i class="fa fa-solid fa-trash"></i></a>
{{--                                                    </form>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="details" class="">Images</label>
                                    <div class="needsclick dropzone" id="document-dropzone"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group clearfix form-switch" >
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="status" name="status"
                                               {{$product->status == 1 ? 'checked' : ''}}

                                               @error('status') is-invalid @enderror  >
                                        <label for="status">
                                            {{(__('admin.active'))}}
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group  clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="featured"
                                               {{$product->featured == 1 ? 'checked' : ''}}
                                               name="featured" @error('featured') is-invalid @enderror  >
                                        <label for="featured">
                                            {{(__('admin.featured'))}}
                                        </label>
                                        @error('featured')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100"> {{__('admin.update_product')}}</button>
                    </div>
                </form>


        </div>

        @endsection

@section('script')
   <script src="{{URL('design/admin')}}/plugins/select2/js/select2.full.min.js"></script>
     <!-- Summernote -->
   <script src="{{URL('design/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
{{--      //dropzone--}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
      <!-- bs-custom-file-input -->
    <script src="{{URL('design/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).ready(function (){
                var categorie_id = $('select[name="Categorie_id"]').val();
                if (categorie_id) {
                    $.ajax({
                        url: "{{URL::to('admin/get_sub_Categorie')}}/" + categorie_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $.each(data, function (key, value) {

                                $('select[name="sub_Categorie_id"]').append('<option + sub + value=" ' + key + '"> ' + value + '</option>');

                            });
                        }
                    })
                } else {
                    console.log('ajax load did not work')
                }

            })

            $('select[name="Categorie_id"]').on('change', function () {

                var categorie_id = $(this).val();

                if (categorie_id) {
                    $.ajax({
                        url: "{{URL::to('admin/get_sub_Categorie')}}/" + categorie_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            $('select[name="sub_Categorie_id"]').empty();
                            $('select[name="sub_Categorie_id"]').append('<option value="null" disabled selected>sub Categorie</option>');

                            $.each(data, function (key, value) {
                                $('select[name="sub_Categorie_id"]').append('<option  value=" ' + key + '"> ' + value + '</option>');

                            });
                        }
                    })
                } else {
                    console.log('ajax load did not work')
                }

            })

        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).ready(function() {
            $('#summernote').summernote();
        });

        let uploadedDocumentMap = {};
        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone("div#document-dropzone",{
            url: '{{ route('upload_image') }}',
            autoProcessQueue: true,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: 10,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            successmultiple: function(data, response) {
                $.each(response['name'], function (key, val) {
                    console.log(response['name']);
                    $('form').append('<input type="hidden" name="images[]" value="' + val + '">');
                    uploadedDocumentMap[data[key].name] = val;
                });
            },
            removedfile: function (file) {
                file.previewElement.remove()
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
                $.ajax({
                    type: 'GET',
                    url: '/admin/delete_image_by_name/'+name,
                    // data: {name: name},

                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
            }
        });

        $("a[id=deleteimage]").click(function(e){
            e.preventDefault()
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: "/admin/delete_image/"+ id,
                    {{--url: '{{route("delete_image", $image->id)}}',--}}
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){
                         document.getElementById(data['id']).style.display = 'none'
                    }
                });

        });
    </script>
@endsection
