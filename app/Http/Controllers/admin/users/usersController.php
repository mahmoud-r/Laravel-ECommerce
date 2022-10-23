<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }
    public function index(){
        $users =User::get() ;
        return view('admin.users.index',compact('users'));
    }
    public function edit($id){
       $user= User::findOrFail($id);
       return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request ,$id){
        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',

        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' =>$request->name ,
            'email' =>$request->email ,
        ]);
        if ($request->new_password)
        {
            $request->validate([
                'new_password' => 'confirmed|min:8|different:password',
            ]);
            $user->update([
                'password'=>Hash::make($request->new_password)
            ]);
        }
        return back()->with('success','user Updated');

    }
    public function destroy($id){

        $user =User::findOrFail($id);
        $user->delete();

        return redirect(route('users'))->with(['deleted'=>__('admin.delete_is_complete')]);

    }



}
