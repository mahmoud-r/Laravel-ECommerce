<?php

use App\Http\Controllers\admin\adminauthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\controller\BannerController;
use App\Http\Controllers\admin\controller\HomesliderController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\orders\OrderController;
use App\Http\Controllers\admin\Product\BrandController;
use App\Http\Controllers\admin\Product\CategorieController;
use App\Http\Controllers\admin\Product\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\users\addresses\addressesController;
use App\Http\Controllers\admin\users\usersController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//config::set('auth.defines','admin');
//config(['auth.defaults.guard' => 'admin']);
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    Route::group(['prefix'=>'control_panel'],function (){

//Ghost
        Route::get('login',[adminauthController::class,'login'])->name('control_panel.login');
        Route::post('dologin',[adminauthController::class,'dologin'])->name('dologin');
        Route::get('forgot/password',[adminauthController::class,'form_forgot_password'])->name('form_forgot_password');
        Route::post('forgot/password',[adminauthController::class,'forgot_password'])->name('forgot_password');
        Route::get('reset/password/{token}',[adminauthController::class,'reset_password']);
        Route::post('reset/password/{token}',[adminauthController::class,'add_new_password'])->name('reset_password');

        //Login
        Route::middleware(['auth:admin','admin:admin'])->group(function (){

            Route::get('/',[DashboardController::class,'index'])->name('control_panel');

            //logout
            Route::any('/logout',[adminauthController::class,'logout'])->name('admin.logout');

            //categorie
            Route::DELETE('sub_categories/delete/{id}',[CategorieController::class,'sub_categories_delete'])->name('sub_categories.delete');
            Route::post('sub_categories/create/{cat_id}',[CategorieController::class,'sub_categories_create'])->name('sub_categories.create');
            Route::get('sub_categories/edit/{id}',[CategorieController::class,'sub_categories_edit'])->name('sub_categories.edit');
            Route::PUT('sub_categories/update/{id}',[CategorieController::class,'sub_categories_update'])->name('sub_categories.update');
            Route::post('categorie/update/inHome',[CategorieController::class,'categorie_in_home'])->name('categorie_in_home');
            Route::resource('categorie',CategorieController::class);

            //brand
            Route::resource('brand',BrandController::class);

            //product
            Route::get('get_sub_Categorie/{cat_id}',[ProductController::class,'get_sub_Categorie']);
            Route::post('/upload_image',[ProductController::class,'uploadImageViaAjax'])->name('upload_image');
            Route::get('/delete_image/{id}',[ProductController::class,'delete_image'])->name('delete_image');
            Route::get('/delete_image_by_name/{name}',[ProductController::class,'delete_image_by_name'])->name('delete_image_by_name');
            Route::PUT('/update_attr/{id}',[ProductController::class,'update_attr'])->name('update_attr');
//            Route::get('/getProducts',[ProductController::class,'getProducts'])->name('getProducts');
            Route::get('/search',[ProductController::class,'search'])->name('admin.product.search');
            Route::resource('product',ProductController::class);


            //roles
            Route::resource('roles', RoleController::class);

//      admins
            Route::resource('admin',AdminController::class);


//        users
            Route::group(['prefix'=>'users'],function (){
                Route::get('/',[usersController::class,'index'])->name('users') ;
                Route::get('/edit/{id}',[usersController::class,'edit'])->name('user.edit') ;
                Route::PUT('/update/{id}',[usersController::class,'update'])->name('user.update') ;
                Route::DELETE('/destroy/{id}',[usersController::class,'destroy'])->name('user.destroy') ;

//          users addresses
                Route::get('/addresses/{id}',[addressesController::class,'addresses'])->name('user.addresses') ;
                Route::resource('addresses',addressesController::class);

            });

//        orders
            Route::group(['prefix'=>'orders'],function (){
                Route::get('/',[OrderController::class,'index'])->name('order.index');
                Route::get('/show/{id}',[OrderController::class,'show'])->name('order.show');
                Route::post('/update/{id}',[OrderController::class,'update_status'])->name('order.update');
                Route::DELETE('/destroy/{id}',[OrderController::class,'destroy'])->name('order.destroy');
                Route::get('/search',[OrderController::class,'search'])->name('admin.order.search');

            });

//        controller
            Route::group(['prefix'=>'controller'],function (){

                Route::resource('slider',HomesliderController::class);
                Route::resource('banner',BannerController::class);
                Route::group(['prefix'=>'setting'],function (){
                   Route::get('/',[SettingController::class,'index'])->name('setting');
                   Route::post('/update',[SettingController::class,'update'])->name('setting.update');
                });

            });

        });

    });




//    Route::middleware('admin:admin')->group(function (){
//
//
//
//
//    });

});

