<?php

use App\Http\Controllers\site\CartController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\OrderController;
use App\Http\Controllers\site\pagesController;
use App\Http\Controllers\site\product\GetproductController;
use App\Http\Controllers\site\product\ReviewController;
use App\Http\Controllers\site\profile\addressesController;
use App\Http\Controllers\site\Profile\OrdersShowController;
use App\Http\Controllers\site\Profile\UserProfileController;
use App\Http\Controllers\site\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::get('/GetCategories', [HomeController::class,'GetCategories'])->name('GetCategories');
    Route::get('/GetBrands', [HomeController::class,'GetBrands'])->name('GetBrands');
    Route::get('/getproduct', [GetproductController::class,'GetProductBYid'])->name('GetProductBYid');
    Route::get('/search', [GetproductController::class,'search'])->name('search');
    Route::get('/result', [GetproductController::class,'search_result'])->name('search_result');
    Route::get('/result/[{}/{}]', [GetproductController::class,'search_result'])->name('search_result_sort');

//    pages
    Route::get('/contactus',[pagesController::class,'contactUS'])->name('contactUS');
    Route::get('/AboutUs',[pagesController::class,'AboutUs'])->name('AboutUs');



//    product
    Route::group(['prefix'=>'product'],function (){
        Route::get('/{id}', [GetproductController::class,'product'])->name('product');
        Route::get('/Category/{name}', [GetproductController::class,'GetProductByCategory'])->name('GetProductByCategory');
        Route::get('/subCategory/{name}', [GetproductController::class,'GetProductBySubCategory'])->name('GetProductBySubCategory');
        Route::get('/brand/{name}', [GetproductController::class,'GetProductByBrand'])->name('GetProductByBrand');
//        Route::get('/Category/{name}/{sort_by}', [GetproductController::class,'GetProductByCategory'])->name('sort-by-price');
        Route::get('/', [GetproductController::class,'filterProduct'])->name('filter');

        Route::group(['prefix'=>'review','middleware'=>'auth'],function (){

            Route::post('/store',[ReviewController::class,'store'])->name('review.store');

        });
    });

//    Profile
    Route::group(['prefix'=>'profile','middleware'=>'auth'],function (){
        Route::get('/', [UserProfileController::class,'index'])->name('profile');
        Route::get('/Information', [UserProfileController::class,'Information'])->name('information');
        Route::post('/Information/update', [UserProfileController::class,'InformationUpdate'])->name('information.update');

//        addresses
        Route::resource('address',addressesController::class);

//        order
        Route::group(['prefix'=>'orders','middleware'=>'auth'],function (){
            Route::get('/',[OrdersShowController::class,'index'])->name('profile.orders');
            Route::get('/show/{order_id}',[OrdersShowController::class,'show'])->name('profile.orders.show');
        });
    });

//    cart
    Route::group(['prefix'=>'cart'],function (){
        Route::get('/',[CartController::class,'index'])->name('cart');
        Route::post('/add',[CartController::class,'add'])->name('cart.add');
        Route::post('/add_and_refresh',[CartController::class,'add_and_refresh'])->name('cart.add_and_refresh');
        Route::post('/update',[CartController::class,'update'])->name('cart.update');
        Route::get('/remove',[CartController::class,'RemovefromCart'])->name('cart.remove');

    });

//    wishlist
    Route::group(['prefix'=>'wishlist','middleware'=>'auth'],function (){

       Route::get('/',[WishlistController::class,'index'])->name('wishlist.index') ;
       Route::post('/store',[WishlistController::class,'store'])->name('wishlist.store') ;
       Route::post('/store_and_refresh',[WishlistController::class,'store_and_refresh'])->name('wishlist.store_and_refresh') ;
       Route::get('/remove',[WishlistController::class,'remove'])->name('wishlist.remove') ;

    });




//    Checkout
    Route::group(['prefix'=>'order','middleware'=>'auth'],function (){
        Route::get('/',[OrderController::class,'information'])->name('order');
        Route::post('/shipping',[OrderController::class,'SaveAddress'])->name('SaveAddress');
        Route::post('/payment',[OrderController::class,'SaveShipping'])->name('SaveShipping');
        Route::post('/CreateOrder',[OrderController::class,'CreateOrder'])->name('CreateOrder');
    });

    Auth::routes(['verify' => true]);
});





