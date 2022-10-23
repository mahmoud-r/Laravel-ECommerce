<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use App\Models\User;

class DashboardController extends Controller

{

    public function index(){
       $totalOrders = order::get()->count();
       $totalProducts = product::get()->count();
       $totalUsers = User::get()->count();
        $ThisMonthsSales=order::where('status_id',5)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('total');

        return view('admin.Dashboard',compact([
            'totalOrders',
            'totalUsers',
            'ThisMonthsSales',
            'totalProducts'
        ]));
    }
}
