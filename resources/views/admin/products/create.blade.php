@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/summernote/summernote-bs4.min.css">
    {{--    //dropzone css--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

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
            <h3 class="card-title">{{__('admin.add_product')}}</h3>
        </div>
        <!-- /.card-header -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('product.store')}}" method="post" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="productname">{{__('admin.product_name')}} </label>
                                    <input type="text" name="name" class="form-control" id="productname" value="{{ old('name')}}" placeholder="{{__('admin.product_name')}}" @error('name') is-invalid @enderror >
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productname">{{__('admin.quantity')}} </label>
                                    <input type="number" name="quantity" value="{{ old('quantity')}}" class="form-control" id="productname" placeholder="{{__('admin.quantity')}}" @error('name') is-invalid @enderror >
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="productname">{{__('admin.price')}} </label>
                                    <input type="number" name="price" value="{{ old('price')}}"  class="form-control" id="productname" placeholder="{{__('admin.price')}}" @error('name') is-invalid @enderror >
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('admin.categories')}}</label>
                                    <select class="form-control select2bs4" name="Categorie_id"   id="Categorie" style="width: 100%;" @error('Categorie_id') is-invalid @enderror >

                                        <option selected="selected" value="null" disabled>{{__('admin.Choose_a_category')}}</option>

                                        @forelse($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
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
                                            style="width: 100%;"
                                            @error('sub_Categorie_id') is-invalid @enderror >

                                        <option value="null" disabled selected>{{__('admin.please_Choose_categories')}}</option>
                                    </select>
                                    @error('sub_Categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{__('admin.brand')}}</label>
                                    <select class="form-control select2bs4" name="brand_id"  style="width: 100%;" @error('brand_id') is-invalid @enderror >

                                        <option selected="selected" value="null" disabled>{{__('admin.Choose_a_brand')}}</option>

                                        @forelse($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                <textarea id="summernote" name="description" @error('brand_id') is-invalid @enderror >
                                     {{old('description')}}
                                  </textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">

                                    <div class="position-relative form-group">
                                        <label for="details" class="">Images</label>
                                        <div class="needsclick dropzone" id="document-dropzone"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group clearfix form-switch" >
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="status" name="status"
                                               checked
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
                                        <input type="checkbox" id="featured" name="featured" @error('featured') is-invalid @enderror  >
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
                        <button type="submit" class="btn btn-primary w-100"> {{__('admin.create_product')}}</button>
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

    <script>
        $(document).ready(function () {

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
                                $('select[name="sub_Categorie_id"]').append('<option value=" ' + key + '"> ' + value + '</option>');

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
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            parallelUploads: 10,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}" ,
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
    </script>
@endsection
