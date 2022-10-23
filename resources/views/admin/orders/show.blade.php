@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    #{{$order->order_number}}
@endsection

@section('page')
    {{__('admin.orders')}}
@endsection


@section('content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right mb-3">
                    <a class="btn btn-primary" href="{{ route('order.index')}}"> {{__('admin.Back')}}</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="info" class="table table-bordered table-striped" >
                                <thead>
                                <tr>
                                    <th  class="text-center">{{__('admin.Order')}}</th>
                                    <th  class="text-center">{{__('admin.order Date')}}</th>
                                    <th  class="text-center">{{__('admin.Shipping Method')}}</th>
                                    <th  class="text-center">{{__('admin.Payment Method')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td  class="text-center">#{{$order->order_number}}</td>
                                    <td  class="text-center">{{$order->created_at->toDateString()}}</td>
                                    <td  class="text-center">{{$order->shipping_method}}</td>
                                    <td  class="text-center">{{$order->payment_method}}</td>
                                </tr>
                                </tbody>

                            </table>
                            <table id="user_info" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th  class="text-center" colspan="1">{{__('admin.name')}}</th>
                                    <th  class="text-center" colspan="1">{{__('admin.City')}}</th>
                                    <th  class="text-center" colspan="1">{{__('admin.address')}}</th>
                                    <th  class="text-center" colspan="1">{{__('admin.phone')}}</th>
                                    <th  class="text-center" colspan="1">{{__('admin.other_phone')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td  class="text-center">{{$order->address->first_name}}</td>
                                    <td  class="text-center">{{$order->address->City}}</td>
                                    <td  class="text-center">{{$order->address->address}}</td>
                                    <td  class="text-center">{{$order->address->phone}}</td>
                                    <td  class="text-center">{{$order->address->other_phone}}</td>
                                </tr>
                                </tbody>

                            </table>

                            <table id="item" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="first_item">{{__('admin.Product Name')}}</th>
                                    <th class="item mywishlist_first text-center">{{__('admin.quantity')}}</th>
                                    <th class="item mywishlist_first text-center" >{{__('admin.price')}}</th>
                                    <th class="item mywishlist_second text-center">{{__('admin.total')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->items as $item)
                                    <tr id="wishlist_59">
                                        <td class="font-weight-bold ">
                                            <a href="{{route('product',$item->products->id)}}">{{$item->product_name}}</a>
                                        </td>
                                        <td class="bold text-center">
                                            {{$item->quantity}}
                                        </td>
                                        <td class="text-center"> {{$item->price}}</td>
                                        <td class="text-center">{{$item->sum_price}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot style="background-color: #2d9ae8 ; color: white;font-weight: bold;text-align: center">
                                <tr>
                                    <td class="bg-white"></td>
                                    <td colspan="2">{{__('admin.Sub Total')}}</td>
                                    <td colspan="1">{{$order->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-white"></td>
                                    <td colspan="2">{{__('admin.shipping')}}</td>
                                    <td colspan="1">{{$order->shipping}}</td>
                                </tr>

                                <tr>
                                    <td class="bg-white"></td>
                                    <td colspan="2">{{__('admin.Tax')}}</td>
                                    <td colspan="1">{{$order->tax}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-white"></td>
                                    <td colspan="2">{{__('admin.Total')}}</td>
                                    <td colspan="1">{{$order->total}}</td>
                                </tr>
                                </tfoot>

                            </table>
                            <form action="{{route('order.update',$order->id)}}" method="post">
                                @csrf
                            <table id="status" class="table table-bordered table-striped" >
                                <thead>
                                <tr>
                                    <th  class="text-center">{{__('admin.status')}}</th>
                                    <th  class="text-center">{{__('admin.note')}}</th>
                                    <th  class="text-center">{{__('admin.update')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                    <td  class="text-center">
                                        <select name="status" class="form-control">
                                            @foreach($status as $st)
                                            <option value="{{$st->id}}" {{$st->id == $order->status->last()->id ? 'selected' : ''}} >
                                                {{$st->status}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td  class="text-center">
                                        <input type="text" name="note" value="{{ $order->status->last()->pivot->note}}"  class="form-control"  >
                                    </td>
                                        <td class="text-center">
                                            @can('order-edit')
                                            <button type="submit" class="btn btn-success">{{__('admin.update')}}</button>
                                            @endcan
                                                <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#history_status">
                                                {{__('admin.history')}}
                                            </button>
                                        </td>
                                </tr>
                                </tbody>


                            </table>
                          </form>
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
        @include('admin.orders.status')

    </section>
@endsection
@section('script')
    @include('admin.layouts.datatable.datatable_js')
    <script>
        $(function () {
            $("#item").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                'searching' :false,
                "paging": false,
                "info": false,
                "ordering": false,
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
            });
        });
        $(function () {
            $("#info").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                'searching' :false,
                "paging": false,
                "info": false,
                "ordering": false,
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
            });
        });
        $(function () {
            $("#user_info").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                'searching' :false,
                "paging": false,
                "info": false,
                "ordering": false,
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
            });
        });
        $(function () {
            $("#status").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                'searching' :false,
                "paging": false,
                "info": false,
                "ordering": false,
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
            });
        });

    </script>
@endsection
