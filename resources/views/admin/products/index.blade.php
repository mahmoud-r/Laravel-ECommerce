@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
     {{__('admin.products')}}
@endsection

@section('page')
    {{__('admin.products')}}
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <a href="{{route('product.create')}}" class="btn btn-block btn-primary w-25">{{__('admin.add')}}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.categories')}}</th>
                                    <th>{{__('admin.brands')}}</th>
                                    <th>QTY</th>
                                    <th>{{__('admin.price')}}</th>
                                    <th>{{__('admin.publish')}}</th>
                                    <th>{{__('admin.featured')}}</th>
                                    <th>{{__('admin.update')}}</th>
                                    <th>{{__('admin.editOrDelete')}}</th>

                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $i=>$product)
                                        <tr>
                                        <td>{{++$i}}</td>
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
                                                    <button type="submit" class="btn btn-info btn-sm mb-1"> {{__('admin.update')}}</button>

                                                </td>
                                            </form>


                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-info btn-sm mb-1"> {{__('admin.Edit')}}</a>

                                            <form action="{{route('product.destroy',$product->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm mb-1 "><i class="fa fa-solid fa-trash"></i></button>
                                            </form>

                                        </td>
                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>
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
@endsection
