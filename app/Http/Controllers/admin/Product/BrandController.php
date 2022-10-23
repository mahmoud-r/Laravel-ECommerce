<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','store']]);
        $this->middleware('permission:brand-create', ['only' => ['create','store',]]);
        $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $brands = brand::get();

        return view('admin.settings.brand.index',compact('brands'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:brands|max:255',
            'name_ar'=>'required|max:255',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (empty($request->image)){

            $photo = null;

        }else{
            $photo = SaveImage($request->image, "brand");
        }


        brand::create([
            'name'=>['en'=>$request->name , 'ar'=>$request->name_ar],
            'image'=>$photo,
        ]);

        return redirect('control_panel/brand')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show(brand $brand)
    {
        //
    }


    public function edit($id)
    {
        $brand = brand::findOrFail($id);

        return view('admin.settings.brand.edit',compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $brand = brand::findOrFail($id);


        $request->validate([
            'name'=>'required|max:255|unique:brands,name,'.$id,
            'name_ar'=>'required|max:255',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (!empty($request->image)){

            DeleteImage($brand->image ,'categorie');
            $photo = SaveImage($request->image, "brand");

        }else{
            $photo = $brand->image ;
        }

        $brand->update([
            'name'=>['en'=>$request->name , 'ar'=>$request->name_ar],
            'image'=>$photo,
        ]);

        return redirect('control_panel/brand')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy($id)
    {
        $brand = brand::findOrFail($id);

        DeleteImage($brand->image ,'brand');
        $brand->delete();
        return redirect('control_panel/brand')->with(['deleted'=>__('admin.delete_is_complete')]);
    }
}
