<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $samples_temp = [];

        for($i = 0; $i < 5; $i++)
        {
            
            $samples_temp[] = [            

                'rut'          => $faker->isbn10,
                'bn'           => $faker->company,
                'contactName'  => $faker->name,
                'address'      => $faker->address,
                'phone'        => $faker->e164PhoneNumber,
                'email'        => $faker->unique->email,
            ];

        }

        Supplier::insert($samples_temp);
    }
}
