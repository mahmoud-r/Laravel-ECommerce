<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
//            PermissionTableSeeder::class,
//            CreateAdminUserSeeder::class,
//            CreateStatusSeeder::class,
//            CreateHomeSliderSeeder::class,
//            CreateBannerSedder::class,
                SettingsTableSeeder::class,
        ]);

//        \App\Models\Categorie::factory(5)->create();
//        \App\Models\sub_Categorie::factory(20)->create();
//        \App\Models\brand::factory(10)->create();
//        \App\Models\product::factory(100)->create();
//        \App\Models\product_image::factory(1000)->create();
    }


}
