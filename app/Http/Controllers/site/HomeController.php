<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\addToCart;
use App\Models\banner;
use App\Models\brand;
use App\Models\Categorie;
use App\Models\Homeslider;
use App\Models\product;
use App\Models\sub_Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
//        slider
        $slider_images = Homeslider::where('status', 1)->where('name', 'slider')->get();
        $sliderImagesRight = Homeslider::where('name', 'right')->get();

//        product
        $new_products = product::where('status', 1)->where('quantity','>',0)->orderBy('updated_at', 'DESC')->limit(12)->get();
        $best_seller = product::where('status', 1)->where('quantity','>',0)->where('best_seller', 1)->orderBy('updated_at', 'DESC')->limit(12)->get();
        $featured = product::where('status', 1)->where('quantity','>',0)->where('featured', 1)->orderBy('updated_at', 'DESC')->limit(12)->get();

        //        in Categore 1
        if (!empty(Categorie::where('in_home', 1)->first())){

            $Categore1 = Categorie::where('in_home', 1)->first();

        }else{
            $Categore1 = Categorie::first();

        }
        $new_products_categore1 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore1->id)->orderBy('updated_at', 'DESC')->limit(18)->get();
        $best_seller_categore1 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore1->id)->where('best_seller', 1)->orderBy('updated_at', 'DESC')->limit(18)->get();
        $featured_categore1 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore1->id)->where('featured', 1)->orderBy('updated_at', 'DESC')->limit(18)->get();


        //        in Categore 2
        if (!empty(Categorie::where('in_home', 2)->first())){

            $Categore2 = Categorie::where('in_home', 2)->first();

        }else{
            $Categore2 = Categorie::orderBy('created_at', 'DESC')->first();

        }
        $new_products_categore2 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore2->id)->orderBy('updated_at', 'DESC')->limit(18)->get();
        $best_seller_categore2 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore2->id)->where('best_seller', 1)->orderBy('updated_at', 'DESC')->limit(18)->get();
        $featured_categore2 = product::where('status', 1)->where('quantity','>',0)->where('Categorie_id',$Categore2->id)->where('featured', 1)->orderBy('updated_at', 'DESC')->limit(18)->get();


//        banners
        $banner1 = banner::where('status', 1)->where('name', 'banner1')->first();
        $banner2 = banner::where('status', 1)->where('name', 'banner2')->first();
        $banner3 = banner::where('status', 1)->where('name', 'banner3')->first();
        $banner4 = banner::where('status', 1)->where('name', 'banner4')->first();
        $banner5 = banner::where('status', 1)->where('name', 'banner5')->first();
        $banner6 = banner::where('status', 1)->where('name', 'banner6')->first();


        return view('front.home', compact('slider_images',
            'sliderImagesRight',
            'new_products',
            'best_seller',
            'featured',
            'banner1',
            'banner2',
            'banner3',
            'banner4',
            'banner5',
            'banner6',
        'new_products_categore1',
        'best_seller_categore1',
        'featured_categore1',
        'Categore1',
         'new_products_categore2',
        'best_seller_categore2',
        'featured_categore2',
        'Categore2',

        ));
    }

    public function GetCategories()
    {
        $categories = Categorie::get();
        return response()->json([
            'categories' => view('front.layouts.header.categries', compact('categories'))->render(),
            'category_center' => view('front.layouts.header.categoryCenter', compact('categories'))->render()
        ]);
    }

    public function GetBrands()
    {
        $Brands = brand::get();
        return response()->json([
            'Brands' => view('front.layouts.footer.brand', compact('Brands'))->render()
        ]);
    }





}
