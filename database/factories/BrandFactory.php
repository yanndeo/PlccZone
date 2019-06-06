<?php
use Faker\Generator as Faker;


$factory->define(App\Models\Brand::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'comment'=> $faker->realText(200,2),
        'avatar' =>$faker->imageUrl(),
    ];
});
