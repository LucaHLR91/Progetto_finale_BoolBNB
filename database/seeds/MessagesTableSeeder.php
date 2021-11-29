<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = FakerFactory::create('it_IT');
        for($i = 0; $i < 4; $i++) {
            $new_message = new Message();
            $new_message->email = $faker->safeemail();
            $new_message->text = $faker->paragraphs(1, true);
            $new_message->date = $faker->date();
            $new_message->apartment_id = $faker->numberBetween(6, 6);
            $new_message->save();
        }
    }
}
