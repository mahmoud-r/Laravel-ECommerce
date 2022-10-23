<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pagesController extends Controller
{
    public function contactUS(){


        return view('front.pages.contactUs');
    }
    public function AboutUs(){
        return view('front.pages.AboutUs');

    }
}
