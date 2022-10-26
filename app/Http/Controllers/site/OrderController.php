<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreate;
use App\Models\Addresses;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function information()
    {
        $cart = \Cart::getContent();

        if ($cart->isEmpty()) {

            return redirect()->route('cart')->withErrors(['error' => 'please add product in cart first']);
        }

        $addresses = Addresses::where('user_id', Auth::user()->id)->get();
        return view('front.order.information', compact('addresses'));
    }

    public function SaveAddress(Request $request)
    {
        $cart = \Cart::getContent();

        if ($cart->isEmpty()) {

            return redirect()->route('home')->withErrors(['error' => 'please add product in cart first']);
        }
        if (empty($request->address)) {
            return redirect()->route('order');
        }
        $addresses = Addresses::where('user_id', Auth::user()->id)->get();
        $selected_id = $request->address;
        return view('front.order.shipping', compact('selected_id', 'addresses'));
    }

    public function SaveShipping(Request $request)
    {
        $cart = \Cart::getContent();

        if ($cart->isEmpty()) {

            return redirect()->route('home')->withErrors(['error' => 'please add product in cart first']);
        }
        $selected_address = $request->address;
        $shipping_method = $request->shipping_method;
        $addresses = Addresses::where('user_id', Auth::user()->id)->get();

        return view('front.order.Payment', compact('selected_address', 'shipping_method', 'addresses'));
    }

    public function CreateOrder(Request $request)
    {

        $cart = \Cart::getContent();

        if ($cart->isEmpty()) {

            return redirect()->route('home')->withErrors(['error' => 'please add product in cart first']);
        }
        $date =Carbon::now();


        $order = order::create([
            'order_number' => $this->get_order_number(),
            'user_id' => Auth::user()->id,
            'addresses_id' => $request->address,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
            'subtotal' => \Cart::getSubTotal(),
            'total' => \Cart::getTotal(),
            'tax' => '0',
            'shipping' => '0',
            'date'=>$date->toDateString()
            ]);
        if ($order){
            $order->status()->attach('1',[
                'date'=>now(),
            ]);
            foreach ($cart as $item) {

                order_item::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'sum_price' => \Cart::get($item->id)->getPriceSum(),
                ]);
                    product::findOrFail($item->id)->decrement('quantity',$item->quantity);
            }

            \Cart::clear();

            Mail::to(Auth::user()->email)->send(new OrderCreate($order));
        }





        return redirect()->route('profile.orders.show',$order->id)->with(['success' => 'your order number ' . '#'.$order->order_number]);

    }

    public function get_order_number(){
        $unique_no = order::orderBy('id', 'DESC')->pluck('order_number')->first();
        if($unique_no == null or $unique_no == ""){
            $unique_no = 1000;
        }
        else{

            $unique_no = $unique_no + 1;
        }
        return $unique_no;
    }

}
