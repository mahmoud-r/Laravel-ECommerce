<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

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
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (empty($request->image)){

            $photo = null;

        }else{
            $photo = SaveImage($request->image, "brand");
        }


        brand::create([
            'name'=>$request->name,
            'image'=>$photo,
        ]);

        return redirect('admin/brand')->with(['success'=>__('admin.add_is_complete')]);
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
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (!empty($request->image)){

            DeleteImage($brand->image ,'categorie');
            $photo = SaveImage($request->image, "brand");

        }else{
            $photo = $brand->image ;
        }

        $brand->update([
            'name'=>$request->name,
            'image'=>$photo,
        ]);

        return redirect('admin/brand')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy($id)
    {
        $brand = brand::findOrFail($id);

        DeleteImage($brand->image ,'brand');
        $brand->delete();
        return redirect('admin/brand')->with(['deleted'=>__('admin.delete_is_complete')]);
    }
}
