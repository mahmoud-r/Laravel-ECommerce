<?php

namespace App\Http\Controllers\site\Profile;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){

        return view('front.profile.profile');
    }
    public function Information(){

        return view('front.profile.information');
    }
    public function InformationUpdate(Request $request){
        $user =Auth::user();
        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',
            'password' => 'required',

        ]);

        if (Hash::check($request->password, $user->password)){
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
        }else{
            return back()->withErrors(['error'=>'your password not correct']);
        }

        return back()->with('success','Profile Updated');
    }


}
