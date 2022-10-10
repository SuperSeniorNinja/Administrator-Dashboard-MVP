<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $car = new Car();
    $types = $car->getTypes();
    $item = $types[array_rand($types)];
    return [
        'make' => $item['make'],
        'model' => $item['model'],
        'year' => $item['year'],
    ];
});
