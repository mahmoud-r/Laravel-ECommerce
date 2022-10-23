@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    Slider
@endsection

@section('page')
    Slider
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('site_control-create')
                        <div class="card-header">
                            <button type="button" class="btn btn-block btn-primary w-25 " data-toggle="modal"
                                    data-target="#slider">{{__('admin.add')}}</button>
                        </div>
                        @endcan
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.Image')}}</th>
                                    <th>{{__('admin.ImageUpdate')}}</th>
                                    <th>{{__('admin.link')}}</th>
                                    <th>{{__('admin.publish')}}</th>
                                    @can('site_control-edit')

                                    <th>{{__('admin.update')}}</th>
                                    @endcan
                                    @can('site_control-delete')
                                        <th>{{__('admin.delete')}}</th>
                                    @endcan

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliderImages as $i=>$slider)

                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                <img src="{{URL('images/slider').'/'.$slider->image}}" width="200px">
                                            </td>
                                     <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <td>

                                          {{ method_field('PUT') }}
                                                <div class="form-group mb-1">
                                                    <label>{{__('The photo should be 780 * 530')}}</label>
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

                                            <td>
                                                <select name="status" class="form-control">
                                                    <option value="1" {{$slider->status == 1 ? 'selected' : ''}}>ON
                                                    </option>
                                                    <option value="0" {{$slider->status == 0 ? 'selected' : ''}}>OFF
                                                    </option>
                                                </select>
                                            </td>
                                         @can('site_control-edit')
                                            <td>
                                                <button type="submit"
                                                        class="btn btn-info btn-sm mb-1"> {{__('admin.update')}}</button>

                                            </td>
                                         @endcan
                                    </form>

                                    @can('site_control-delete')
                                    <td>
                                        <form action="{{route('slider.destroy',$slider->id)}}" method="post"
                                              class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mb-1 "><i
                                                    class="fa fa-solid fa-trash"></i></button>
                                        </form>

                                    </td>
                                            @endcan
                                    </tr>

                                @endforeach
                                </tbody>
                                <tbody>
                                @foreach($sliderImagesRight as $i=>$sliderRight)
                                    <form action="{{route('slider.update',$sliderRight->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td >
                                            <img src="{{URL('images/slider').'/'.$sliderRight->image}}" width="200px">
                                        </td>

                                        <td>
                                                <div class="form-group mb-1">
                                                    <label>slider Images Right</label>
                                                    <input type="file" name="image" class="form-control "
                                                           placeholder="{{__('admin.image')}}">
                                                </div>
                                                @error('image')
                                                <div class="text-danger mb-3">{{ $message }}</div>
                                            @enderror
                                        </td>

                                        <td>
                                            <input type="text" name="link" value="{{$sliderRight->link}}"
                                                   class="form-control " placeholder="{{__('admin.link')}}">

                                        </td>
                                        <td>
                                            <select name="status" disabled class="form-control">
                                                <option value="1" {{$sliderRight->status == 1 ? 'selected' : ''}}>ON
                                                </option>
                                            </select>
                                        </td>
                                        @can('site_control-create')
                                        <td colspan="2" class="text-center">
                                            <button type="submit" class="btn btn-info btn-sm mb-1">
                                                {{__('admin.update')}}
                                            </button>

                                        </td>
                                        @endcan
                                    </tr>
                                    </form>

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
    @include('admin.controll.slider.create')
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
