<?php

use App\Http\Controllers\admin\adminauthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\Product\BrandController;
use App\Http\Controllers\admin\Product\CategorieController;
use App\Http\Controllers\admin\Product\ProductController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


config::set('auth.defines','admin');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    Route::group(['prefix'=>'admin'],function (){

//Ghost
        Route::get('login',[adminauthController::class,'login']);
        Route::post('dologin',[adminauthController::class,'dologin'])->name('dologin');
        Route::get('forgot/password',[adminauthController::class,'form_forgot_password'])->name('form_forgot_password');
        Route::post('forgot/password',[adminauthController::class,'forgot_password'])->name('forgot_password');
        Route::get('reset/password/{token}',[adminauthController::class,'reset_password']);
        Route::post('reset/password/{token}',[adminauthController::class,'add_new_password'])->name('reset_password');

        //Login
        Route::middleware('admin:admin')->group(function (){

            //logout
            Route::post('/logout',[adminauthController::class,'logout'])->name('logout');

            //roles
            Route::resource('roles', RoleController::class);

            //categorie
            Route::DELETE('sub_categories/delete/{id}',[CategorieController::class,'sub_categories_delete'])->name('sub_categories.delete');
            Route::post('sub_categories/create/{cat_id}',[CategorieController::class,'sub_categories_create'])->name('sub_categories.create');
            Route::get('sub_categories/edit/{id}',[CategorieController::class,'sub_categories_edit'])->name('sub_categories.edit');
            Route::PUT('sub_categories/update/{id}',[CategorieController::class,'sub_categories_update'])->name('sub_categories.update');
            Route::resource('categorie',CategorieController::class);

            //brand
            Route::resource('brand',BrandController::class);

            //product
            Route::get('get_sub_Categorie/{cat_id}',[ProductController::class,'get_sub_Categorie']);
            Route::post('/upload_image',[ProductController::class,'uploadImageViaAjax'])->name('upload_image');
            Route::get('/delete_image/{id}',[ProductController::class,'delete_image'])->name('delete_image');
            Route::get('/delete_image_by_name/{name}',[ProductController::class,'delete_image_by_name'])->name('delete_image_by_name');
            Route::PUT('/update_attr/{id}',[ProductController::class,'update_attr'])->name('update_attr');
            Route::resource('product',ProductController::class);

        });






    });




    Route::middleware('admin:admin')->group(function (){
        Route::resource('admin',AdminController::class);
        Route::any('logout',[adminauthController::class,'logout'])->name('logout');




    });

});

