<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title'=> $faker->company,
        'description'=> $faker->text,
        'avatar' =>$faker->imageUrl(),
    ];
});
