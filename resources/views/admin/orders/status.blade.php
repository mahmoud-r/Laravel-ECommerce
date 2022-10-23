

<!-- Modal -->
<div class="modal fade" id="history_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal modal-dialog-centered   bd-example-modal-lg" role="document">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">#{{$order->order_number}} {{__('admin.status')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="std table">
                    <thead>
                    <tr>
                        <th  class="text-center" colspan="">{{__('admin.status')}}</th>
                        <th  class="text-center" colspan="">{{__('admin.note')}}</th>
                        <th  class="text-center" colspan="">{{__('admin.date')}}</th>
                        <th  class="text-center" colspan="">{{__('admin.updated by')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->status as $status)
                        <tr>
                            <td  class="text-center font-weight-bold
                        @if($status->status == 'pending')
                                            text-secondary
                                            @elseif($status->status == 'accept')
                                            text-warning
                                            @elseif($status->status == 'shipping')
                                           text-info
                                            @elseif($status->status == 'return')
                                            text-warning
                                            @elseif($status->status == 'complete')
                                             text-success
                                            @elseif($status->status == 'cancel')
                                            text-danger
                                            @endif
                        ">{{$status->status}}</td>
                            <td  class="text-center">{{$status->pivot->note}}</td>
                            <td  class="text-center">{{$status->pivot->date}}</td>
                            <td  class="text-center">{{$status->pivot->user}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
        </div>
</div>
