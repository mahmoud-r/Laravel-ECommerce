@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
     {{__('admin.Users')}}
@endsection

@section('page')
    {{__('admin.Users')}}
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
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.email')}}</th>
                                    <th>{{__('admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $i =>$user)
                                        <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('user.addresses',$user->id) }}">{{__('admin.addresses')}}</a>
                                            @can('users-edit')
                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-sm"> {{__('admin.Edit')}}</a>
                                            @endcan
                                            @can('users-delete')
                                            <form action="{{route('user.destroy',$user->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm "> {{__('admin.delete')}}</button>
                                            </form>
                                            @endcan
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
