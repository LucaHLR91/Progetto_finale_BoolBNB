<?php

use App\Apartment;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;


class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = FakerFactory::create('it_IT');
        for($i = 0; $i < 3; $i++) {
            $new_apartment = new Apartment();
            $new_apartment->title = $faker->sentence(3);
            $new_apartment->beds = $faker->numberBetween(1, 5);
            $new_apartment->rooms = $faker->numberBetween(1, 5);
            $new_apartment->bathrooms = $faker->numberBetween(1, 3);
            $new_apartment->square_meters= $faker->numberBetween(40, 120);
            $new_apartment->image= $faker->image(null, 640, 480, 'house', true, true, null);
            $new_apartment->avaliability= $faker->boolean();
            $new_apartment->address = $faker->address();
            $new_apartment->city= 'Milano';
            $new_apartment->latitude= $faker->latitude(45, 46);
            $new_apartment->longitude= $faker->longitude(9, 10);
            $new_apartment->slug= Str::slug($new_apartment->title, '-');
            $new_apartment->user_id= $faker->numberBetween(1, 3);
            $new_apartment->save();
        }
    }
}

