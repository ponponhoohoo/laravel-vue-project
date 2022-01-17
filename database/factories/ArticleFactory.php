<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articles;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'title' => $this->faker->word(),
        'content' => $this->faker->text(),
        'category' => $this->faker->numberBetween($min = 1, $max = 5),
    ];
});
