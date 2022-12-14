<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminsRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','store']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store',]]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $admins = admin::get();
        $roles = Role::pluck('name','name')->all();
        return view('admin.admins.index',compact('admins','roles'));
    }


    public function create()
    {
        //
    }


    public function store(StoreAdminsRequest $request)
    {
       $admin = admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $admin->assignRole($request->input('roles'));

        return redirect('control_panel/admin')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $admin = admin::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $adminRole = $admin->roles->pluck('name','name')->all();
        if($admin){

            return view('admin.admins.edit',compact('admin','roles','adminRole'));
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
            'roles' => 'required'
        ]);
        $admin = admin::findOrFail($id);
        if($admin){
            $admin->update([
               'name'=>$request->name,
               'email'=>$request->email,
            ]);

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $admin->assignRole($request->input('roles'));

            return redirect('control_panel/admin')->with(['success'=>__('admin.edit_is_complete')]);
        }
        else {
            return back();
        }
    }


    public function destroy($id)
    {
        $admin = admin::findOrFail($id);

        $admin->delete();
        return redirect('control_panel/admin')->with(['deleted'=>__('admin.delete_is_complete')]);
    }
}
