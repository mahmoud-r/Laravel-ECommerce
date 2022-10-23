<?php

namespace Database\Seeders;

use App\Models\banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateBannerSedder extends Seeder
{

    public function run()
    {
       $banners = [
         ['name'=>'banner1','image'=>'banner1.jpg','link'=>'#','status'=>'1'],
         ['name'=>'banner2','image'=>'banner2.jpg','link'=>'#','status'=>'1'],
         ['name'=>'banner3','image'=>'banner3.jpg','link'=>'#','status'=>'1'],
         ['name'=>'banner4','image'=>'banner4.jpg','link'=>'#','status'=>'1'],
         ['name'=>'banner5','image'=>'banner5.jpg','link'=>'#','status'=>'1'],
         ['name'=>'banner6','image'=>'banner6.jpg','link'=>'#','status'=>'1'],
       ];

       foreach ($banners as $banner){
           banner::create($banner);
       }
    }
}
