<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\brand;
use App\Models\Categorie;
use App\Models\product;
use App\Models\product_image;
use App\Models\sub_Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
            $products =product::get();
            return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $categories =Categorie::select('name','id')->get();
        $brands =brand::select('name','id')->get();

        return view('admin.products.create',compact('categories','brands'));
    }


    public function store(StoreProductRequest $request)
    {
        $status = $request->status == 'on' ? 1 : 0 ;
        $featured = $request->status == 'on' ? 1 : 0 ;

        $product = product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'status'=> $status,
            'featured'=>$featured,
            'brand_id'=>$request->brand_id,
            'Categorie_id'=>$request->Categorie_id,
            'sub_Categorie_id'=>$request->sub_Categorie_id,
        ]);
        foreach ($request->images as $image) {

            product_image::create([
                'name' => $image,
                'product_id' => $product->id
            ]);
        }

        return redirect('admin/product')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories =Categorie::select('name','id')->get();
        $brands =brand::select('name','id')->get();
        $product = product::findOrFail($id);


        return view('admin.products.edit',compact('product','categories','brands'));
    }


    public function update(StoreProductRequest $request, $id)
    {

        $status = $request->status == 'on' ? 1 : 0 ;
        $featured = $request->status == 'on' ? 1 : 0 ;

        $product = product::findOrFail($id);

        $product ->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'status'=> $status,
            'featured'=>$featured,
            'brand_id'=>$request->brand_id,
            'Categorie_id'=>$request->Categorie_id,
            'sub_Categorie_id'=>$request->sub_Categorie_id,
        ]);
      if ($request->images){
          foreach ($request->images as $image) {

              product_image::create([
                  'name' => $image,
                  'product_id'=> $product->id
              ]);
          }
      }


        return redirect('admin/product')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy($id)
    {
        $product = product::findOrFail($id);

        $product->delete();
        return redirect('admin/product')->with(['deleted'=>__('admin.delete_is_complete')]);
    }



    public function get_sub_Categorie($id){

        $sub_Categorie = sub_Categorie::where('categorie_id' ,$id)->pluck('name', 'id');

       return $sub_Categorie ;

    }

    public function uploadImageViaAjax(Request $request)
    {


        $name = [];
        $original_name = [];
        foreach ($request->file('file') as $value) {
            $image = uniqid() . time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = public_path().'/images/product';
            $value->move($destinationPath, $image);
            $name[] = $image;
            $original_name[] = $value->getClientOriginalName();

        }
        return response()->json([
            'name'          => $name,
            'original_name' => $original_name
        ]);


    }
    public function delete_image($id){
        $image = product_image::findOrFail($id);
        $image->delete();
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id' => $id ,
        ]);
    }

    public function delete_image_by_name($name){

        DeleteImage($name,'product');
        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
    public function update_attr(Request $request,$id){

        $request->validate([
            'quantity'=> 'required|numeric|integer|min:0',
            'price'=> 'required|numeric|min:0',
            'status'=> 'nullable|integer|between:1,10',
            'featured'=> 'nullable|integer|between:1,10',
        ],[
            'status.between' => 'The status must be ON or OFF ',
            'featured.between' => 'The status must be ON or OFF ',
        ]);
        $product = product::findOrFail($id);

        $product ->update([
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'status'=> $request->status,
            'featured'=>$request->featured,

        ]);
        return redirect('admin/product')->with(['success'=>__('admin.edit_is_complete')]);
}
}
