<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User as usr;
use App\Supplier as sup;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker\Factory as Faker;

class ConsultaApp extends TestCase
{
    
    //Revisar bien si hay elementos importantes en la bbs
    //use RefreshDatabase;    
    //hacer respaldo haciendo otra bbs y montandola en env


    // ejecutar test: p tests/Feature/ConsultaApp --filter testMetodo

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    function testPortalGraficos(){

        $textos = [
            'Bienvenido al portal administrativo',
            'Suministros',
            'Elementos de protección personal',
            'Herramientas'
        ];
        $faker = Faker::create();

        $user = factory(usr::class)->create([
            'lname' => $faker->lastName,
            'phone' => $faker->e164PhoneNumber,
            'charge' => $faker->jobTitle.' Department'
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => $user->password,  //credenciales correctas
        ]);

        $this->get("/home")
            ->assertStatus(200)
            ->assertSeeText('Bienvenido al portal administrativo');
    }

    
}
