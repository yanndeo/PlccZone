<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'brand_id' => random_int(\DB::table('brands')->min('id'), \DB::table('brands')->max('id')),
        'category_id' =>random_int(\DB::table('categories')->min('id'), \DB::table('categories')->max('id')),
        'name' => $faker->colorName,
        'reference' =>$faker->unique()->creditCardNumber(null,true,'-'),
        'description' => $faker->text(100),
    ];
});
