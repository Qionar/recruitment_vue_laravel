<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

use Faker\Factory;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $woman_imgs = [];
        $man_imgs = [];

        for ($i = 1; $i < 7; $i++) {
            array_push($woman_imgs, 'img/woman_placeholder_' . $i . '.svg');
            array_push($man_imgs, 'img/man_placeholder_' . $i . '.svg');
        }

        $faker = Factory::create();


        // creating a woman customers

        for ($i = 1; $i < 7; $i++) {
            $customer = new Customer();
            $customer->title = "Mrs.";
            $customer->name = $faker->firstNameFemale();
            $customer->surname = $faker->lastName();
            $customer->phone = $faker->unique()->e164PhoneNumber();
            $customer->email = $faker->unique()->email();
            $customer->profile_image = array_shift($woman_imgs);
            $customer->save();
        }

        // creating a man customers

        for ($i = 1; $i < 7; $i++) {
            $customer = new Customer();
            $customer->title = "Mr.";
            $customer->name = $faker->firstNameMale();
            $customer->surname = $faker->lastName();
            $customer->phone = $faker->unique()->e164PhoneNumber();
            $customer->email = $faker->unique()->email();
            $customer->profile_image = array_shift($man_imgs);
            $customer->save();
        }
    }
}
