<?php

use App\Http\Controllers\admin\adminauthController;
use App\Http\Controllers\admin\AdminController;
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
            Route::post('/logout',[adminauthController::class,'logout'])->name('logout');
        });

    });


    Route::middleware('admin:admin')->group(function (){
        Route::resource('admin',AdminController::class);
        Route::any('logout',[adminauthController::class,'logout'])->name('logout');
    });

});

