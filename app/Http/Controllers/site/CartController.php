<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {

        return view('front.Profile.cart');
    }

    public function add(Request $request)
    {
        $product = product::find($request->product_id);
        $cart = empty(\Cart::getContent()[$request->product_id]) ? 0 : \Cart::getContent()[$request->product_id]->quantity;

        $stock = $request->Quantity + $cart;

        if ($request->Quantity > 0 && $stock <= $product->quantity) {
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->Quantity,
                'attributes' => array('image' => $product->images[0]->name,),
                'associatedModel' => $product
            ));
            $qty =\Cart::getContent()[$request->product_id]->quantity ;

            return response()->json([
                'success' => view('front.layouts.models.cart-model',compact('product','qty'))->render(),
                'item' => $request->item,
                'total' => \Cart::getTotal(),
                'subtotal' => \Cart::getSubTotal(),
                'count' => \Cart::getTotalQuantity(),
                'html' => view('front.layouts.header.cart')->render()
            ]);
        } else {
            $qty =\Cart::getContent()[$request->product_id]->quantity ;
            return response()->json([
                'success' => view('front.layouts.models.cart-model',compact('product','qty'))->render(),

            ]);
        }

    }

    public function add_and_refresh(Request $request)
    {
        $product = product::find($request->product_id);
        $cart = empty(\Cart::getContent($request->product_id)[1]) ? 0 : \Cart::getContent($request->product_id)[1]->quantity;

        $stock = $request->Quantity + $cart;

        if ($request->Quantity > 0 && $stock <= $product->quantity) {
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->Quantity,
                'attributes' => array('image' => $product->images[0]->name,),
                'associatedModel' => $product
            ));
            return back()->with('done');
        } else {
            return back()->with('false');
        }
    }

    public function RemovefromCart(Request $request)
    {

        \Cart::remove($request->item);
        return response()->json([
            'success' => 'PRODUCT DELETED SUCCESSFULLY ',
            'item' => $request->item,
            'total' => \Cart::getTotal(),
            'subtotal' => \Cart::getSubTotal(),
            'countInCart' => \Cart::getTotalQuantity(),
            'count' => \Cart::getTotalQuantity(),
            'html' => view('front.layouts.header.cart')->render()

        ]);
    }

    public function update(Request $request)
    {
        $product = product::find($request->item);

        $quantity = $request->quantity >= 0 && $request->quantity <= $product->quantity ? $request->quantity : $product->quantity;

        \Cart::update($request->item, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        return response()->json([
            'success' => 'PRODUCT SUCCESSFULLY UPDATE',
            'item' => $request->item,
            'total' => \Cart::getTotal(),
            'subtotal' => \Cart::getSubTotal(),
            'quantity' => $quantity,
            'count' => \Cart::getTotalQuantity(),
            'totalItem' => \Cart::get($request->item)->getPriceSum(),
            'countInCart' => \Cart::getTotalQuantity(),
            'html' => view('front.layouts.header.cart')->render(),
        ]);


    }
}
