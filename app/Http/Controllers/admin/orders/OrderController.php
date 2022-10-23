<?php

namespace App\Http\Controllers\admin\orders;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:order-list|order-edit|order-delete', ['only' => ['index','search','show','']]);
        $this->middleware('permission:order-edit', ['only' => ['update_status']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    public function index(){
        $orders = order::orderBy('updated_at', 'DESC')->paginate(20);
        $status = Status::get();
        return view('admin.orders.index',compact('orders','status'));
    }
    public function search(Request $request){
        $orders = order::query();



        if (!empty($request->status)){

            $orders = $orders->where('status_id',$request->status);
        }
        if (!empty($request->date)){
            $date = explode('-',$request->date);
            $from = date('Y-m-d', strtotime($date[0]));
            $to = date('Y-m-d', strtotime($date[1]));
            $orders = $orders->whereBetween('date',[$from,$to]);
        }
        if (!empty($request->order_number)){
            $orders = $orders->where('order_number',$request->order_number);
        }
        if (!empty($request->phone)){
            $orders = $orders->whereHas('address',function ($q) use ($request) {
                $q->where('phone',$request->phone);
            });
        }

        $orders =$orders->orderBy('updated_at', 'DESC')->paginate(20);
        $status = Status::get();
        return view('admin.orders.index',compact('orders','status'));

    }

    public  function show($id){
        $order = order::findOrFail($id);
        $status = Status::get();
        return view('admin.orders.show',compact('order','status'));
}

        public function update_status(Request $request ,$id){
        $order = order::findOrFail($id);
        $order->status()->attach($request->status,[
            'note'=>$request->note,
            'date'=>now(),
            'user'=>Auth::guard('admin')->user()->name,
        ]);
        $order->status_id = $request->status ;
        $order->save();

            return redirect()->back()->with(['success'=>__('admin.edit_is_complete')]);
        }

    public function destroy($id){
        $order = order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with(['deleted'=>__('admin.delete_is_complete')]);
    }
}
