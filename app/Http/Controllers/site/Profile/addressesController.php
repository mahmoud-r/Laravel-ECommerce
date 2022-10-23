<?php

namespace App\Http\Controllers\site\profile;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addressesController extends Controller
{

    public function index()
    {
        $addresses =Auth::user()->addresses()->get();
        return view('front.profile.addresses.index',compact('addresses'));
    }


    public function create()
    {
        return view('front.profile.addresses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' =>'required|min:4|string|max:255',
            'last_name' =>'required|min:4|string|max:255',
            'City' =>'required|min:4|string|max:255',
            'phone' =>'required|numeric|digits:11',
            'other_phone' =>'numeric|digits:11|nullable',
        ]);
        Addresses::create([

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'City'=>$request->City,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'other_phone'=>$request->other_phone,
            'user_id'=>Auth::user()->id
        ]);

        return redirect()->route('address.index')->with('success','Address Created');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $address= Addresses::where('user_id',Auth::user()->id)->where('id',$id)->first();
        return view('front.profile.addresses.edit',compact('address'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' =>'required|min:4|string|max:255',
            'last_name' =>'required|min:4|string|max:255',
            'City' =>'required|min:4|string|max:255',
            'phone' =>'required|numeric|digits:11',
            'other_phone' =>'numeric|digits:11|nullable',
        ]);
        $address= Addresses::where('user_id',Auth::user()->id)->where('id',$id)->first();
        $address->update([

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'City'=>$request->City,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'other_phone'=>$request->other_phone,
        ]);

        return redirect()->route('address.index')->with('success','Address Updated');
    }


    public function destroy($id)
    {
        $address= Addresses::where('user_id',Auth::user()->id)->where('id',$id)->first();
        $address->delete();
        return redirect()->route('address.index')->with('DELETED','Address Deleted');
    }
}

