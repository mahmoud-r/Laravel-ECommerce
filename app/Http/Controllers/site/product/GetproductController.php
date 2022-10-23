<?php

namespace App\Http\Controllers\site\product;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\Categorie;
use App\Models\product;
use App\Models\sub_Categorie;
use Illuminate\Http\Request;

class GetproductController extends Controller
{
    public function GetProductBYid(Request $request){


        $product = product::find($request->id);
        return response()->json([
            'product' =>view('front.layouts.models.quick_view_model',compact('product'))->render(),

        ]);
    }

    public function product($id)
    {
        $product = product::findOrFail($id);
//        return $product->reviews->avg('review');
        $related_products = product::where('Categorie_id', $product->Categorie_id)->where('status', 1)->orderBy('updated_at', 'DESC')->limit(10)->get();
        $bestsealer = product::where('Categorie_id', $product->Categorie_id)->where('best_seller', 1)->orderBy('updated_at', 'DESC')->limit(6)->get();
        $featured_categore = product::where('status', 1)->where('Categorie_id',$product->Categorie_id)->where('featured', 1)->orderBy('updated_at', 'DESC')->limit(6)->get();

        return view('front.products.product', compact('product', 'related_products', 'bestsealer','featured_categore'));
    }


    public function GetProductByCategory(Request $request,$name)
    {
        $products = product::whereHas('Categorie', function ( $q) use ($name) {
            $q->where('name->en', $name)->orWhere('name->ar',$name);
        })->where('status', 1) ;

        $this->orderBY($request ,$products);

        $min_price = $products->min('price');
        $max_price = $products->max('price');

        $products =$products->paginate(44)->withQueryString()  ;

        $Categorie =Categorie::where('name->en', $name)->orWhere('name->ar',$name)->first();

        $sub_Categories= $Categorie->sub_Categories;

         $brands = brand::whereHas('categories',function ($q) use ($Categorie) {
            $q->where('Categorie_id',$Categorie->id);
        })->orderBy('updated_at', 'DESC')->get() ;

        return view('front.products.products', compact( 'products','name','sub_Categories','Categorie','brands','min_price','max_price'));
    }

    public function GetProductBySubCategory(Request $request,$name)
    {
        $products = product::whereHas('sub_Categorie', function ( $q) use ($name) {
            $q->where('name->en', $name)->orWhere('name->ar',$name);
        })->where('status', 1) ;

        $this->orderBY($request ,$products);

        $min_price = $products->min('price');
        $max_price = $products->max('price');

        $products =$products->paginate(44)->withQueryString()  ;

        $sub_Categories[] = sub_Categorie::where('name->en', $name)->orWhere('name->ar',$name)->first();

         $Categorie = $sub_Categories[0]->categorie;

         $brands = brand::whereHas('categories',function ($q) use ($Categorie) {
            $q->where('Categorie_id',$Categorie->id);
        })->orderBy('updated_at', 'DESC')->get() ;

        return view('front.products.products', compact( 'products','name','sub_Categories','Categorie','brands','min_price','max_price'));
    }

    public function GetProductByBrand(Request $request,$name)
    {

         $products = product::whereHas('brand', function ( $q) use ($name) {
            $q->where('name->en', $name)->orWhere('name->ar',$name);
        })->where('status', 1);

            $this->orderBY($request ,$products);

        $min_price = $products->min('price');
        $max_price = $products->max('price');

        $products =$products->paginate(44)->withQueryString()  ;

        $brand = brand::where('name->en', $name)->orWhere('name->ar',$name)->first();

        $sub_Categories = sub_Categorie::whereHas('brands',function ($q) use ($brand) {
            $q->where('brand_id',$brand->id);
        })->orderBy('updated_at', 'DESC')->get() ;

        return view('front.products.productsbybrand', compact( 'products','name','sub_Categories','brand','max_price','min_price'));
    }


    public function filterProduct(Request $request){

                 $products = product::query();

                if ($request->filled('category')){

                    $category = $request->category;

                    $products =  $products->whereIn('Categorie_id',$category);

                }
                if ($request->filled('subcategory')){

                    $subCategory = $request->subcategory;

                    $products =  $products->whereIn('sub_Categorie_id',$subCategory);

                }
                if ($request->filled('brand')){

                    $brand = $request->brand;

                    $products =  $products->whereIn('brand_id',$brand);

                }
                if ($request->filled('min_price')){
                    $min_price = $request->min_price;
                    $products =  $products->where('price','>=',$min_price);
                }
                if ($request->filled('max_price')){

                    $products =  $products->where('price','<=',$request->max_price);
                }
                if ($request->filled('search')){

                    $products =  $products->where('name','LIKE','%'.$request->search.'%')
                        ->orWhere('description','LIKE','%'.$request->search.'%');
                }
                $products=  $products->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(44);


        return view('front.products.productsAjax',compact('products'))->render();
    }

    public function search(Request $request){
        if (!empty($request->search)){

            $products = product::
            where('name','LIKE','%'.$request->search.'%')
                ->orWhere('description','LIKE','%'.$request->search.'%')
                ->orderBy('updated_at', 'DESC')->limit(5)->get();

            return response()->json([
                'products' => view('front.layouts.header.list_search',compact('products'))->render()
            ]);
        }else{
            return response()->json([
                'products' => 'empty'
            ]);
        }

    }


    public function search_result(Request $request){
        $products = product::where('name','LIKE','%'.$request->search.'%')
            ->orWhere('description','LIKE','%'.$request->search.'%');

                $this->orderBY($request ,$products);
                $min_price = $products->min('price');
                $max_price = $products->max('price');

                $products =$products->paginate(44)->withQueryString() ;

        $brands = brand::whereHas('products',$this->searchQuery($request))->orderBy('updated_at', 'DESC')->get() ;

        $Categories = Categorie::whereHas('products',$this->searchQuery($request))->orderBy('updated_at', 'DESC')->get() ;

        $sub_Categories = sub_Categorie::whereHas('products',$this->searchQuery($request))->orderBy('updated_at', 'DESC')->get();

        $name = $request->search;
        return view('front.products.search_result',compact('products','name','Categories','brands','sub_Categories','min_price','max_price'));
    }

    protected function orderBY($request,$products){
        if ($request->sort == 'price_asc'){

           return $products =$products->orderBy('price', 'asc') ;
        }
        if ($request->sort == 'price_desc'){

            return $products =$products->orderBy('price', 'desc') ;
        }
        if ($request->sort == 'name_desc'){

            return $products =$products->orderBy('name', 'desc') ;
        }
        if ($request->sort == 'name_asc'){

            return  $products =$products->orderBy('name', 'asc') ;
        }
        $products =$products->orderBy('created_at', 'desc') ;
    }

    protected function searchQuery($request){
        return function ($q) use ($request) {
            $q->where('name','LIKE','%'.$request->search.'%')
                ->orWhere('description','LIKE','%'.$request->search.'%');
        };
    }

}
