<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\sub_Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::get();
        return view('admin.settings.Categorie.index',compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:255',
            'description'=>'max:500',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (empty($request->image)){

            $photo = null;
        }else{
            $photo = SaveImage($request->image, "categorie");
        }


        Categorie::create([
           'name'=>$request->name,
           'description'=>$request->description,
           'image'=>$photo,
        ]);

       return redirect('admin/categorie')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show( $id)
    {
        $sub_Categories = Categorie::findOrFail($id)->sub_Categories;

        $categories = Categorie::findOrFail($id);


        return view('admin.settings.Categorie.show',compact('sub_Categories','categories'));
    }


    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('admin.settings.Categorie.edit',compact('categorie'));
    }


    public function update(Request $request, $id)
    {


        $categorie = Categorie::findOrFail($id);


        $request->validate([
            'name'=>'required|max:255|unique:categories,name,'.$id,
            'description'=>'max:500',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (!empty($request->image)){

            DeleteImage($categorie->image ,'categorie');
            $photo = SaveImage($request->image, "categorie");

        }else{
            $photo = $categorie->image ;
        }

        $categorie->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$photo,
        ]);

        return redirect('admin/categorie')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);

        DeleteImage($categorie->image ,'categorie');
        $categorie->delete();
        return redirect('admin/categorie')->with(['deleted'=>__('admin.delete_is_complete')]);
    }

    //sub_categories

    public function sub_categories_create(Request $request ,$cat_id){
        $request->validate([
            'name'=>'required|unique:sub__categories|max:255',
        ]);
        sub_Categorie::create([
            'name'=>$request->name,
            'categorie_id'=>$cat_id
        ]);

        return back()->with(['success'=>__('admin.add_is_complete')]);
    }

    public function sub_categories_delete(Request $request , $id){

        $sub_categorie = sub_Categorie::findOrFail($id);

        $sub_categorie->delete();
        return back()->with(['deleted'=>__('admin.delete_is_complete')]);
    }

    public function sub_categories_edit($id){
        $sub_categorie = sub_Categorie::findOrFail($id);

        return view('admin.settings.Categorie.sub_categories_edit',compact('sub_categorie'));
    }

    public function sub_categories_update(Request $request ,$id){

        $request->validate([
            'name'=>'required|max:255|unique:sub__categories,name,'.$id,
        ]);
        $sub_categorie = sub_Categorie::findOrFail($id);

        $sub_categorie->update([
            'name'=>$request->name,
            'categorie_id'=>$request->categorie_id
        ]);

        return back()->with(['success'=>__('admin.edit_is_complete')]);
    }


}
