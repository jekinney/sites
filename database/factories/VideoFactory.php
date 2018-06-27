<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Videos\Models\Video::class, function (Faker $faker) {
    return [
        'slug' => str_slug( $faker->word ),
        'name' => $faker->word,
        'path' => 'https://vimeo.com/279317758',
        'screen' => $faker->imageUrl( 600, 600 ),
        'description' => $faker->sentence,
        'publish_at' => Carbon::now()->subWeek(),
    ];
});