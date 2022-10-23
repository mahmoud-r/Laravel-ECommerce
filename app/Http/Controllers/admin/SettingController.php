<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Settings', ['only' => ['index','update']]);

    }
    public function index()
    {
        return view('admin.controll.setting.index');
    }

    public function update(Request $request)
    {
        if ($request->has('site_logo') && ($request->file('site_logo') )) {

            if (Setting::get('site_logo') != null) {
                DeleteImage(Setting::get('site_logo'),'logo');
            }
            $logo = SaveImage($request->file('site_logo'), 'logo');
            Setting::set('site_logo', $logo);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') )){

            if (Setting::get('site_favicon') != null) {
                DeleteImage(Setting::get('site_favicon'),'logo');
            }
            $logo = SaveImage($request->file('site_favicon'), 'logo');
            Setting::set('site_favicon', $logo);

        }elseif ($request->has('site_logo_on_white') && ($request->file('site_logo_on_white'))){
             if (Setting::get('site_logo_on_white') != null) {
                 DeleteImage(Setting::get('site_logo_on_white'),'logo');
             }
            $logo = SaveImage($request->file('site_logo_on_white'), 'logo');
            Setting::set('site_logo_on_white', $logo);

        } else {

            $keys = $request->except(['_token','files']);
            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }
        }
        return back()->with('success', 'Settings updated successfully.');
    }
}
