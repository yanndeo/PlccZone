<?php

use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
 use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



      /*  $brands = factory(App\Models\Brand::class, 24)->create();

        $categories = factory(App\Models\Category::class, 8)->create();

        $products = factory(App\Models\Product::class, 500)->create();*/






            $categories = \App\Models\Category::all();
             $brands = \App\Models\Brand::all();

             foreach ($categories as $category) {

                 DB::table('brand_category')->insert([

                     'category_id' => $categories->random()->id,
                     'brand_id' => $brands->random()->id,
                     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                 ]);

             }

    }
}
