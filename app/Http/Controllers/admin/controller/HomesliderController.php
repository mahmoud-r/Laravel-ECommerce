<?php

namespace App\Http\Controllers\admin\controller;

use App\Http\Controllers\Controller;
use App\Models\Homeslider;
use Illuminate\Http\Request;

class HomesliderController extends Controller
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
        $sliderImages = Homeslider::where('name','slider')->get();
        $sliderImagesRight = Homeslider::where('name','right')->get();
        return view('admin.controll.slider.index',compact('sliderImages','sliderImagesRight'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'link'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $photo = SaveImage($request->image, "slider");


        Homeslider::create([
            'link'=>$request->link,
            'image'=>$photo,
        ]);

        return redirect()->route('slider.index')->with(['success'=>__('admin.add_is_complete')]);
    }


    public function show(Homeslider $homeslider)
    {
        //
    }


    public function edit(Homeslider $homeslider)
    {
        //
    }


    public function update(Request $request,  $id)
    {
        $slider = Homeslider::findOrFail($id);


        $request->validate([
            'link'=>'required|',
            'image'=>'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required|integer|between:0,1',

        ]);
        if (!empty($request->image)){

            DeleteImage($slider->image ,'slider');
            $photo = SaveImage($request->image, "slider");

        }else{
            $photo = $slider->image ;
        }

        $slider->update([
            'link'=>$request->link,
            'status'=>$request->status,
            'image'=>$photo,
        ]);

        return redirect()->route('slider.index')->with(['success'=>__('admin.edit_is_complete')]);
    }


    public function destroy(Homeslider $homeslider)
    {
        //
    }
}
