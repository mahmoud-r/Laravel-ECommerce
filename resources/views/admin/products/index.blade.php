@section('style')
    @include('admin.layouts.datatable.datatable_css')
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endsection
@extends('admin.layouts.master')

@section('tittle')
     {{__('admin.products')}}
@endsection

@section('page')
    {{__('admin.products')}}
@endsection


@section('content')
    @include('admin.products.search')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('products-create')
                        <div class="card-header">
                                <a href="{{route('product.create')}}" class="btn btn-block btn-primary w-25">{{__('admin.add')}}</a>
                        </div>
                        @endcan
                            <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.categories')}}</th>
                                    <th>{{__('admin.brand')}}</th>
                                    <th>QTY</th>
                                    <th>{{__('admin.price')}}</th>
                                    <th>{{__('admin.publish')}}</th>
                                    <th>{{__('admin.featured')}}</th>
                                    <th>{{__('admin.best_seller')}}</th>
                                    @can('products-edit')
                                    <th>{{__('admin.update')}}</th>
                                    @endcan
                                    @can('products-edit','products-delete')
                                    <th>{{__('admin.editOrDelete')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $i=>$product)
                                        <tr>
                                        <td>{{$rank++}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->Categorie->name}}</td>
                                        <td>{{$product->brand->name}}</td>
                                            <form action="{{route('update_attr',$product->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <td>
                                                 <input type="number" name="quantity" class="form-control"    value="{{$product->quantity}}" placeholder="{{__('admin.quantity')}}" @error('name') is-invalid @enderror >
                                                </td>
                                                <td>
                                                    <input type="text" name="price" class="form-control"  value="{{$product->price}}" placeholder="{{__('admin.price')}}" @error('name') is-invalid @enderror >

                                                </td>
                                                <td>
                                                    <select name="status" class="form-control">
                                                        <option value="1" {{$product->status == 1 ? 'selected' : ''}}>ON</option>
                                                        <option value="0" {{$product->status == 0 ? 'selected' : ''}}>OFF</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="featured" class="form-control">
                                                        <option value="1" {{$product->featured == 1 ? 'selected' : ''}}>ON</option>
                                                        <option value="0" {{$product->featured == 0 ? 'selected' : ''}}>OFF</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="best_seller" class="form-control">
                                                        <option value="1" {{$product->best_seller == 1 ? 'selected' : ''}}>ON</option>
                                                        <option value="0" {{$product->best_seller == 0 ? 'selected' : ''}}>OFF</option>
                                                    </select>
                                                </td>
                                                @can('products-edit')
                                                <td>
                                                    <button type="submit" class="btn btn-info btn-sm mb-1"> {{__('admin.update')}}</button>

                                                </td>
                                                @endcan
                                            </form>

                                            @can('products-edit','products-delete')
                                        <td>
                                            @can('products-edit')
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-info btn-sm mb-1"> {{__('admin.Edit')}}</a>
                                            @endcan
                                                @can('products-delete')
                                            <form action="{{route('product.destroy',$product->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm mb-1 "><i class="fa fa-solid fa-trash"></i></button>
                                            </form>
                                            @endcan
                                        </td>
                                            @endcan
                                        </tr>

                                    @endforeach
                                </tbody>

                            </table>

                            {{ $products->withQueryString()->links(('vendor.pagination.bootstrap-4')) }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </section>
@endsection

@section('script')
    @include('admin.layouts.datatable.datatable_js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": false,
                'info' :false ,
                "searching": false ,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "{{__('datatable.no_data')}}",
                    "info":           "{{__('datatable.info')}}",
                    "infoEmpty":      "Showing 0 to 0 of 0 entries",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Show _MENU_ entries",
                    "loadingRecords": "{{__('datatable.loadingRecords')}}",
                    "processing":     "",
                    "search":         "{{__('datatable.search')}}",
                    "zeroRecords":    "{{__('datatable.zeroRecords')}}",
                    "paginate": {
                        "first":      "{{__('datatable.first')}}",
                        "last":       "{{__('datatable.last')}}",
                        "next":       "{{__('datatable.next')}}",
                        "previous":   "{{__('datatable.previous')}}"
                    },
                    "buttons":{
                        "copy":  "{{__('datatable.copy')}}",
                        "excel":  "{{__('datatable.excel')}}",
                        "pdf":  "pdf",
                        "print":  "{{__('datatable.print')}}",
                        "colvis":  "{{__('datatable.colvis')}}",
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });

    </script>
    <script src="{{URL('design/admin')}}/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
        $(document).ready(function () {

            $('select[name="Categorie_id"]').on('change', function () {

                var categorie_id = $(this).val();

                if (categorie_id) {
                    $.ajax({
                        url: "{{URL::to('control_panel/get_sub_Categorie')}}/" + categorie_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="sub_Categorie_id"]').empty();
                            $('select[name="sub_Categorie_id"]').append('<option value=""  selected>All</option>');

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

    </script>
@endsection
