@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    Banner
@endsection

@section('page')
    Banner
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.Image')}}</th>
                                    <th>{{__('admin.ImageUpdate')}}</th>
                                    <th>{{__('admin.link')}}</th>
                                    @can('site_control-edit')
                                    <th>{{__('admin.publish')}}</th>

                                    <th>{{__('admin.update')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bannerImages as $i=>$slider)

                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                <img src="{{URL('images/banner').'/'.$slider->image}}" width="200px">
                                            </td>
                                     <form action="{{route('banner.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <td>

                                          {{ method_field('PUT') }}
                                                <div class="form-group mb-1">
                                                    <input type="file" name="image" class="form-control "
                                                           placeholder="{{__('admin.image')}}">
                                                </div>
                                                @error('image')
                                                <div class="text-danger mb-3">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            <td>
                                                <input type="text" name="link" value="{{$slider->link}}"
                                                       class="form-control " placeholder="{{__('admin.link')}}">

                                            </td>
                                         @can('site_control-edit')
                                            <td>
                                                <select name="status" class="form-control">
                                                    <option value="1" {{$slider->status == 1 ? 'selected' : ''}}>ON
                                                    </option>
                                                    <option value="0" {{$slider->status == 0 ? 'selected' : ''}}>OFF
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit"
                                                        class="btn btn-info btn-sm mb-1"> {{__('admin.update')}}</button>

                                            </td>
                                         @endcan
                                    </form>


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
                    "decimal": "",
                    "emptyTable": "{{__('datatable.no_data')}}",
                    "info": "{{__('datatable.info')}}",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Show _MENU_ entries",
                    "loadingRecords": "{{__('datatable.loadingRecords')}}",
                    "processing": "",
                    "search": "{{__('datatable.search')}}",
                    "zeroRecords": "{{__('datatable.zeroRecords')}}",
                    "paginate": {
                        "first": "{{__('datatable.first')}}",
                        "last": "{{__('datatable.last')}}",
                        "next": "{{__('datatable.next')}}",
                        "previous": "{{__('datatable.previous')}}"
                    },
                    "buttons": {
                        "copy": "{{__('datatable.copy')}}",
                        "excel": "{{__('datatable.excel')}}",
                        "pdf": "pdf",
                        "print": "{{__('datatable.print')}}",
                        "colvis": "{{__('datatable.colvis')}}",
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
