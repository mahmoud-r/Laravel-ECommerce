<?php

namespace App\Http\Controllers\site\Profile;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class OrdersShowController extends Controller
{
        public function index(){
            $orders = order::where('user_id',auth()->user()->id)->get();

            return view('front.Profile.orders.index',compact('orders'));
        }

        public function show($id){
            $order = order::where('user_id',auth()->user()->id)->where('id',$id)->first();

            return view('front.Profile.orders.show',compact('order'));
        }
}
