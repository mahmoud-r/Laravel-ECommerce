<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\sub_Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Categories-list|Categories-create|Categories-edit|Categories-delete', ['only' => ['index','store','show']]);
        $this->middleware('permission:Categories-create', ['only' => ['create','store','sub_categories_create']]);
        $this->middleware('permission:Categories-edit', ['only' => ['edit','update','categorie_in_home','sub_categories_edit','sub_categories_update']]);
        $this->middleware('permission:Categories-delete', ['only' => ['destroy','sub_categories_delete']]);
    }
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
            'name_ar'=>'required|max:255',
            'description'=>'max:500',
            'description_ar'=>'max:500',

        ]);



        Categorie::create([
           'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
           'description'=>['en'=>$request->description , 'ar'=>$request->description_ar],
        ]);

       return redirect('control_panel/categorie')->with(['success'=>__('admin.add_is_complete')]);
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
            'name_ar'=>'required|max:255'.$id,
            'description'=>'max:500',
            'description_ar'=>'max:500',

        ]);


        $categorie->update([
            'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
            'description'=>['en'=>$request->description , 'ar'=>$request->description_ar],
        ]);

        return redirect('control_panel/categorie')->with(['success'=>__('admin.edit_is_complete')]);
    }

    public function categorie_in_home(Request $request){

        $request->validate([
            'status'=> 'nullable|integer|between:1,2',
        ]);

        $categorie = Categorie::findOrFail($request->id);

        $categorie->update([
            'in_home' => $request->status,
        ]);

        return response()->json(['Success'=>__('admin.edit_is_complete')]);
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);

        DeleteImage($categorie->image ,'categorie');
        $categorie->delete();
        return redirect('control_panel/categorie')->with(['deleted'=>__('admin.delete_is_complete')]);
    }

    //sub_categories

    public function sub_categories_create(Request $request ,$cat_id){
        $request->validate([
            'name'=>'required|max:255',
            'name_ar'=>'required|max:255',
        ]);
        sub_Categorie::create([
            'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
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
            'name_ar'=>'required|max:255',
        ]);
        $sub_categorie = sub_Categorie::findOrFail($id);

        $sub_categorie->update([
            'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
            'categorie_id'=>$request->categorie_id
        ]);

        return back()->with(['success'=>__('admin.edit_is_complete')]);
    }


}
