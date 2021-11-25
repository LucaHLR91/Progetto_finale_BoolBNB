<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use App\User;

class UsersTableSeeder extends Seeder
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
            $new_user = new User;
            $new_user->name = $faker->name();
            $new_user->surname= $faker->lastName();
            $new_user->date_of_birth= $faker->dateTimeBetween('-70 years', '-18 years');
            $new_user->email= $faker->safeEmail();
            $new_user->password= Hash::make($faker->password(8, 20));
            $new_user->save();
        }
    }
}
