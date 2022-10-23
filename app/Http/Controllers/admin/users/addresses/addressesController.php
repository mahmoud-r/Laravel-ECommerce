<?php

namespace App\Http\Controllers\admin\users\addresses;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\User;
use Illuminate\Http\Request;

class addressesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['addresses','store']]);
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }
    public function addresses($id)
    {
        $addresses= User::findOrFail($id)->addresses()->get();
       return view('admin.users.addresses.index',compact('addresses'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $address = Addresses::findOrFail($id);
        return view('admin.users.addresses.edit',compact('address'));
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
        $address = Addresses::findOrFail($id);
        $address->update([

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'City'=>$request->City,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'other_phone'=>$request->other_phone,
        ]);
//
        return back()->with('success','address Updated');

    }


    public function destroy($id)
    {
        $address = Addresses::findOrFail($id);
        $address->delete();
        return back()->with(['deleted'=>__('Address Deleted')]);
    }
}
