@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.admins_show')}}
@endsection

@section('page')
    {{__('admin.admins_show')}}
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-block btn-primary w-25 "data-toggle="modal" data-target="#exampleModalCenter">{{__('admin.add')}}</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.email')}}</th>
                                    <th></th>
                                    <th>{{__('admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($admins as $admin)
                                        <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                            <td>
                                                @if(!empty($admin->getRoleNames()))
                                                    @foreach($admin->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                        <td>
                                            <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i> </a>
                                            <form action="{{route('admin.destroy',$admin->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm "> <i class="fas fa-trash"></i></button>
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
        @include('admin.admins.create')
    </section>
@endsection

@section('script')
    @include('admin.layouts.datatable.datatable_js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"],
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
