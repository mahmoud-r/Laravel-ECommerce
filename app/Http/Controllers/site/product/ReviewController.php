<?php

namespace App\Http\Controllers\site\product;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'rating'=>'required|numeric|integer|between:1,5',
            'comment' =>'required|max:255',
        ]);
        $user = Auth::user()->id;
        $review = review::create([
            'user_id'=>$user ,
            'product_id' => $request->product_id,
            'review' => $request->rating,
            'comment' => $request->comment
        ]);
        if ($review){
            return response()->json(['success'=>'Thank you for your review']) ;
        }
    }
}
