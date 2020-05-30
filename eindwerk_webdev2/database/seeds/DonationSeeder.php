<?php

use App\Donation;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker library instantiëren, om te gebruiken
        $faker = Faker\Factory::create();

        // nieuwe instantie van Room-model
        $donation = new Donation();

        // willekeurig nummer en naam
        $donation->name = $faker->name();
        $donation->email = $faker->unique()->email();
        $donation->amount = $faker->numberBetween(0,500);
        $donation->message = $faker->realText(50);
        $donation->visible = true;

        // bewaren
        $donation->save();
    }
}
