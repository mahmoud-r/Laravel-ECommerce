<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateStatusSeeder extends Seeder
{

    public function run()
    {
        $status =[
            ['status' => 'pending'],
            ['status' => 'accept'],
            ['status' => 'shipping'],
            ['status' => 'return'],
            ['status' => 'complete'],
            ['status' => 'cancel']
        ];
        foreach ($status as $item){
            Status::create($item);
        }


    }
}
