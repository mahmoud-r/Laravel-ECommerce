<?php

namespace Database\Seeders;

use App\Models\Homeslider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateHomeSliderSeeder extends Seeder
{


    public function run()
    {
        $Slider = [
            ['name' => 'slider','image' => '1663792352.jpg','link' => '#', 'status' => '1'],
            ['name' => 'slider','image' => '1663791786.jpg','link' => '#','status' => '1'],
            ['name' => 'slider','image' => '1663791823.jpg','link' => '#','status' => '1'],
            ['name' => 'right','image' => '1663796575.jpg','link' => '#','status' => '1'],
            ['name' => 'right','image' => '1663796614.jpg','link' => '#','status' => '1'],
        ];
        foreach($Slider as $item){
            Homeslider::create($item);
        }

    }

}


