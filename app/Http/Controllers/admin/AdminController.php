<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = admin::get();
        return view('admin.admins.index',compact('admins'));
    }


    public function create()
    {
        //
    }


    public function store(AdminsRequest $request)
    {
        admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('admin')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $admin = admin::findOrFail($id);

        if($admin){

            return view('admin.admins.edit',compact('admin'));
        }
        else {
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$id,
        ]);
        $admin = admin::findOrFail($id);
        if($admin){
            $admin->update([
               'name'=>$request->name,
               'email'=>$request->email,
            ]);

            return redirect('admin')->with(['success'=>__('admin.edit_is_complete')]);
        }
        else {
            return back();
        }
    }


    public function destroy($id)
    {
        $admin = admin::findOrFail($id);

        $admin->delete();
        return redirect('admin')->with(['deleted'=>__('admin.delete_is_complete')]);
    }
}
