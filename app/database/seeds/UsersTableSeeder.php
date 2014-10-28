<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            User::create([
                'uts_id' => $faker->randomNumber(7) . $index,
                'password' => 'secret'
            ]);
        }
    }

}