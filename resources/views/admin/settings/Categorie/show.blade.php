@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.sub_categories')}} : {{$categories->name}}
@endsection

@section('page')
    {{__('admin.categories')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('categorie.index')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('Categories-create')
                        <div class="card-header">
                            <button type="button" class="btn btn-block btn-primary w-25 "data-toggle="modal" data-target="#addcategorie">{{__('admin.add')}}</button>
                        </div>
                        @endcan
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($sub_Categories as $sub_Categorie)
                                    <tr>
                                        <td>{{ $sub_Categorie->id }}</td>
                                        <td>{{$sub_Categorie->name}}</td>

                                        <td>
                                            @can('Categories-edit')
                                            <a href="{{route('sub_categories.edit',$sub_Categorie->id)}}" class="btn btn-info btn-sm"> {{__('admin.Edit')}}</a>
                                            @endcan
                                            @can('Categories-delete')
                                            <form action="{{route('sub_categories.delete',$sub_Categorie->id)}}" method="post" class="d-inline">
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
@include('admin.settings.Categorie.create_sub_categore')
@section('script')
    @include('admin.layouts.datatable.datatable_js')
    <script>
        $(function () {
            $("#example1").DataTable({
                // "responsive": true, "lengthChange": false, "autoWidth": false,

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
