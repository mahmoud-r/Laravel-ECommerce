@section('style')
    @include('admin.layouts.datatable.datatable_css')
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endsection
@extends('admin.layouts.master')

@section('tittle')
     {{__('admin.orders')}}
@endsection

@section('page')
    {{__('admin.orders')}}
@endsection


@section('content')
    @include('admin.orders.search')
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
                                <tr>
                                    <th  class="text-center">Order</th>
                                    <th  class="text-center">Date</th>
                                    <th  class="text-center">Shipping Method</th>
                                    <th  class="text-center">Payment Method</th>
                                    <th  class="text-center">Total</th>
                                    <th  class="text-center">Status</th>
                                    <th  class="text-center"></th>
                                </tr>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $i =>$order)
                                        <tr>
                                            <td  class="text-center">#{{$order->order_number}}</td>
                                            <td  class="text-center">{{$order->date}}</td>
                                            <td  class="text-center">{{$order->shipping_method}}</td>
                                            <td  class="text-center">{{$order->payment_method}}</td>
                                            <td  class="text-center">{{$order->total}}</td>
                                            <td  class="text-center font-weight-bold"><span class="
                                            @if($order->status->last()->status == 'pending')
                                            text-secondary
                                            @elseif($order->status->last()->status == 'accept')
                                            text-warning
                                            @elseif($order->status->last()->status == 'shipping')
                                           text-info
                                            @elseif($order->status->last()->status == 'return')
                                            text-warning
                                            @elseif($order->status->last()->status == 'complete')
                                             text-success
                                            @elseif($order->status->last()->status == 'cancel')
                                            text-danger
                                            @endif
                                            ">{{$order->status->last()->status}}</span></td>

                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('order.show',$order->id) }}">{{__('admin.Show')}}</a>

{{--                                            <a href="{{route('order.edit',$order->id)}}" class="btn btn-info btn-sm"> {{__('admin.Edit')}}</a>--}}
                                            @can('order-delete')
                                            <form action="{{route('order.destroy',$order->id)}}" method="post" class="d-inline">
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
                            {{ $orders->withQueryString()->links(('vendor.pagination.bootstrap-4')) }}

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

    <script src="{{URL('design/admin')}}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{URL('design/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
            $('#reservation').daterangepicker();
        $(function () {

            $("#example1").DataTable({
                "paging": false,
                'info' :false ,
                "searching": false ,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                'order': [[3, 'desc']],
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

        $("#all_time").change(function() {
            if(this.checked) {
                $('#reservation').removeAttr('disabled')
            }else {
                $('#reservation').attr('disabled',true)
            }
        });
    </script>
@endsection
