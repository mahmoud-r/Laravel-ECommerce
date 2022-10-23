<?php

namespace App\Http\Controllers\admin\controller;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:site_control-list|site_control-create|site_control-edit|site_control-delete', ['only' => ['index','store']]);
        $this->middleware('permission:site_control-create', ['only' => ['create','store',]]);
        $this->middleware('permission:site_control-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:site_control-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $bannerImages = banner::get();
        return view('admin.controll.banner.index',compact('bannerImages'));
    }




    public function update(Request $request,  $id)
    {
        $slider = banner::findOrFail($id);


        $request->validate([
            'link'=>'required|',
            'image'=>'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required|integer|between:0,1',

        ]);
        if (!empty($request->image)){

            DeleteImage($slider->image ,'banner');
            $photo = SaveImage($request->image, "banner");

        }else{
            $photo = $slider->image ;
        }

        $slider->update([
            'link'=>$request->link,
            'status'=>$request->status,
            'image'=>$photo,
        ]);

        return redirect()->route('banner.index')->with(['success'=>__('admin.edit_is_complete')]);
    }


}
