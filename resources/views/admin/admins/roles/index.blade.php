@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.Role_Management')}}
@endsection

@section('page')
    {{__('admin.Role_Management')}}
@endsection



@section('content')
    <div class="row">

            <div class="pull-right mb-3">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> {{__('admin.Create_New_Role')}}</a>
                @endcan
            </div>
        </div>
    </div>




<div class="card-body">
    <table class="table table-bordered" id="example2">
        <tr>
            <th>#</th>
            <th>{{__('admin.name')}}</th>
            <th width="280px">{{__('admin.action')}}</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{__('admin.Show')}}</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{__('admin.Edit')}}</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                        <button type="submit" class="btn btn-danger  "> {{__('admin.delete')}}</button>
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

</div>


    {!! $roles->render() !!}



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
