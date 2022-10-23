@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
     {{__('admin.categories')}}
@endsection

@section('page')
    {{__('admin.categories')}}
@endsection


@section('content')
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
                        <div class="alert alert-success inhome " style="width: 50%; display: none;" role="alert">
                            {{__('admin.edit_is_complete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin.name')}}</th>
                                    <th>{{__('admin.description')}}</th>
                                    <th>in_home</th>
                                    <th>{{__('admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($categories as $i =>$categorie)
                                        <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$categorie->name}}</td>

                                        <td>{{$categorie->description}}</td>
                                        <td>
                                            <form method="post" action="{{route('categorie_in_home',$categorie->id)}}">
                                                @csrf
                                                {{ method_field('PUT') }}


                                                <select name="in_home" class="form-control" data_cat_id="{{$categorie->id}}">
                                                    <option value=""  {{$categorie->in_home ==null ? 'selected' : '' }} >IN Home</option>
                                                    <option value="1" {{$categorie->in_home ==1 ? 'selected' : '' }} >1</option>
                                                    <option value="2" {{$categorie->in_home ==2 ? 'selected' : '' }}>2</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('categorie.show',$categorie->id) }}">{{__('admin.sub_categories')}}</a>
                                            @can('Categories-edit')
                                            <a href="{{route('categorie.edit',$categorie->id)}}" class="btn btn-info btn-sm"> {{__('admin.Edit')}}</a>
                                            @endcan
                                            @can('Categories-delete')
                                            <form action="{{route('categorie.destroy',$categorie->id)}}" method="post" class="d-inline">
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
        @include('admin.settings.Categorie.create')
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

        // update In Home
        $(function (){
            $("select[name='in_home']").on('change',function (e){
                e.preventDefault()
                var status = $(this).val();
                var id = $(this).attr('data_cat_id');
                $.ajax({
                    url: '{{route('categorie_in_home')}}',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}",'status': status,'id':id},
                    success: function (response) {

                        $('.inhome').show()
                    },
                })

            });
        })
    </script>
@endsection
