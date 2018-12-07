<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $sup = new Supplier();

        $sup->name                 = 'Cristobal';
        $sup->company                = 'Elite';
        $sup->address 				= 'Los canarios #530';
        $sup->email                = 'sin_datos@elite.com';
        $sup->phone 				= '+56912345678';
            
        $sup->save();

        $samples_temp = [];
    /*
        for($i = 0; $i < 5; $i++)
        {
            
            $samples_temp[] = [
                'name'   		=> $faker->name,
                'company' 		=> $faker->company,
                'address' 		=> $faker->address,
                'email'			=> $faker->unique->email ,
                'phone'			=> $faker->e164PhoneNumber
                
            ];

        }

        Supplier::insert($samples_temp);*/
    }
}
