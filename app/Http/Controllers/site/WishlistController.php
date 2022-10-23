<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", $user->id)->orderby('id', 'desc')->get();
        $featured_categore = product::where('status', 1)->where('featured', 1)->orderBy('updated_at', 'DESC')->limit(12)->get();
        return view('front.profile.wishlist.index', compact('wishlists','featured_categore'));
    }


    public function store(Request $request)
    {
        $wishlist = wishlist::where('product_id', $request->id)->where('user_id', Auth::user()->id)->first();

        if ($wishlist) {

        } else {
            $wishlist = wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]);

        }
        return response()->json([
            'success' => 'The product was successfully added to your wishlist.'
        ]);

    }
    public function store_and_refresh(Request $request)
    {
        $wishlist = wishlist::where('product_id', $request->id)->where('user_id', Auth::user()->id)->first();

        if ($wishlist) {

        } else {
            $wishlist = wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]);

        }
        return redirect()->back();

    }



    public function remove(Request $request)
    {
        $wishlist = wishlist::where('product_id', $request->id)->where('user_id', Auth::user()->id)->first();
        $wishlist->delete();
        return response()->json([
            'DELETED' => 'The product was successfully Deleted of your wishlist.'
        ]);
    }
}
