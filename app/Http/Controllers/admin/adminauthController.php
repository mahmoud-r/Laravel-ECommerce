<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use App\Models\admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function App\Http\aurl;

class adminauthController extends Controller
{
    public function Login(){
        if (Auth::guard('admin')->check()) {
            return redirect('control_panel');
        }
        return view('admin.auth.login');
    }

    public function dologin(Request $request){
        $rememberme = $request->rememberme == 1 ? true :false ;


        if (auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$rememberme)){
            return redirect('control_panel');
        }else{
           return redirect('control_panel/login')->withErrors([session('error','__login_fild')]);
        }
    }


    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('control_panel/login');
    }

    public function form_forgot_password(){
        return view('admin.auth.forgot_password');
    }

    public function forgot_password(Request $request){
        $request->validate([
            'email' => 'required|exists:App\Models\admin,email'
        ],[
            'required' =>'email required',
            'exists' =>'please add valid email',
        ]);

        $admin = admin::where('email',$request->email)->first();

        if ($admin){
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);

            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin , 'token'=>$token]));
            return back()->with(['succses'=>'the link reset password send']);
        }
        return back();
    }

    public function reset_password($token){
        $data = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($data)){
            return view('admin.auth.reset_password',compact('data'));
        }else{
            redirect('forot_password');
        }
    }

    public function add_new_password ( Request $request ,$token){
        $request->validate([
            'password' =>'required|confirmed',
            'password_confirmation' =>'required',
        ],[
            'required' =>'password required',
            'confirmed' =>'please add confirmation password',
        ],[
            'password' =>'password',
            'password_confirmation' =>'confirmation password'
        ]);
        $data = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($data)){
           $admin = admin::where('email',$data->email)->update([
               'email'=>$data->email,
               'password'=>Hash::make($request->password),
               ]);
           DB::table('password_resets')->where('email',$request->email)->delete();

            auth()->guard('admin')->attempt(['email'=>$data->email,'password'=>$request->password],true);
           return redirect('control_panel');
        }else{
            redirect('forot_password');
        }
    }
}
