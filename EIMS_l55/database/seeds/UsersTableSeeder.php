<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = new User();

        $user->name                 = 'Leo';
        $user->lName                = 'Caloguerea';
        $user->type 				= 'admin';
        $user->email                = 'l.caloguerea@gmail.com';
        $user->phone 				= '+56966080281';
        $user->charge               = 'Developer';
        $user->status               = 'active';
        $user->password             = bcrypt('123456');
        $user->avatar               = '/img/dimebag.jpg';
            
        $user->save();

        $samples_temp = [];

        for($i = 0; $i < 5; $i++)
        {
            
            $samples_temp[] = [            

            	'type'			=> 'worker',
                'name'   		=> $faker->firstName,
                'lName' 		=> $faker->lastName,
                'email'			=> $faker->unique->email ,
                'phone'			=> $faker->e164PhoneNumber,
                'charge'        => $faker->jobTitle.' Department',
                'status'        => $faker->randomElement(['active', 'disable']),
                'password'		=> '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'avatar'       => '/img/icons/icon-user.png' 
            ];

        }

        User::insert($samples_temp);






    }
}
