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
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:products-list|products-create|products-edit|products-delete', ['only' => ['index','store']]);
        $this->middleware('permission:products-create', ['only' => ['create','store',]]);
        $this->middleware('permission:products-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

            $products =product::orderBy('created_at', 'DESC')->paginate(20);
            $categories = Categorie::get();
            $brands = brand::get();
            $rank = $products->firstItem();
            return view('admin.products.index',compact('products','rank','categories','brands'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function search(Request $request){
        $products = product::query();

        if (!empty($request->search)){

            $products = $products->where('name','LIKE','%'.$request->search.'%');
        }

        if (!empty($request->Categorie_id)){
            $products = $products->where('Categorie_id',$request->Categorie_id);
        }
         if (!empty($request->sub_Categorie_id)){

            $products = $products->where('sub_Categorie_id',$request->sub_Categorie_id);
        }
         if (!empty($request->brand_id)){

            $products = $products->where('brand_id',$request->brand_id);
        }
        $products =$products->orderBy('updated_at', 'DESC')->paginate(20);
        $categories = Categorie::get();
        $brands = brand::get();
        $rank = $products->firstItem();

        return view('admin.products.index',compact('products','rank','categories','brands'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

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
        $featured = $request->featured == 'on' ? 1 : 0 ;
        $best_seller = $request->best_seller == 'on' ? 1 : 0 ;

        $product = product::create([
            'name'=>['en'=>$request->name , 'ar'=>$request->name_ar],
            'description'=>['en'=>$request->description , 'ar'=>$request->description_ar],
            'short_description'=> ['en'=>$request->short_description , 'ar'=>$request->short_description_ar],
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'status'=> $status,
            'featured'=>$featured,
            'best_seller'=>$best_seller,
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

        return redirect('control_panel/product')->with(['success'=>__('admin.add_is_complete')]);
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
        $featured = $request->featured == 'on' ? 1 : 0 ;
        $best_seller = $request->best_seller == 'on' ? 1 : 0 ;

        $product = product::findOrFail($id);

        $product ->update([
            'name'=>['en'=>$request->name , 'ar'=>$request->name_ar],
            'description'=>['en'=>$request->description , 'ar'=>$request->description_ar],
            'short_description'=> ['en'=>$request->short_description , 'ar'=>$request->short_description_ar],
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'status'=> $status,
            'featured'=>$featured,
            'best_seller'=>$best_seller,
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


        return redirect('control_panel/product')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy($id)
    {
        $product = product::findOrFail($id);
        foreach ($product->images as $img){

            DeleteImage($img->name,'product');

        }

        $product->delete();
        return redirect('control_panel/product')->with(['deleted'=>__('admin.delete_is_complete')]);
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
        DeleteImage($image->name,'product');
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
            'status'=> 'nullable|integer|between:0,1',
            'featured'=> 'nullable|integer|between:0,1',
            'best_seller'=> 'nullable|integer|between:0,1',
        ],[
            'status.between' => 'The status must be ON or OFF ',
            'best_seller.between' => 'The status must be ON or OFF ',
            'featured.between' => 'The status must be ON or OFF ',
        ]);
        $product = product::findOrFail($id);

        $product ->update([
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'status'=> $request->status,
            'featured'=>$request->featured,
            'best_seller'=>$request->best_seller,

        ]);
        return redirect('control_panel/product')->with(['success'=>__('admin.edit_is_complete')]);
}
}
