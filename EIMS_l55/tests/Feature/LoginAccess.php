<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User as usr;
use Faker\Factory as Faker;

class LoginAccess extends TestCase
{
	//Revisar bien si hay elementos importantes en la bbs
    use RefreshDatabase;    
    //hacer respaldo haciendo otra bbs y montandola en env

    // ejecutar test: p tests/Feature/LoginAccess --filter testMetodo

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    function testLoginCorrectoUsuario(){
    	
        $faker = Faker::create();

    	$user = factory(usr::class)->create([
            'lname' => $faker->lastName,
            'phone' => $faker->e164PhoneNumber,
            'charge' => $faker->jobTitle.' Department'
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => $user->password,	//credenciales correctas
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    	

    }

    function testLoginIncorrectoUsuario(){
    	
    	$faker = Faker::create();

        $user = factory(usr::class)->create([
            'lname' => $faker->lastName,
            'phone' => $faker->e164PhoneNumber,
            'charge' => $faker->jobTitle.' Department'
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,	//usuario correcto
            'password' => 'password',	//clave incorrecta
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionMissing($user->password);
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();

    }

    function testLoginUsuarioRegistrado(){

        $faker = Faker::create();

        $user = factory(usr::class)->create([
            'lname' => $faker->lastName,
            'phone' => $faker->e164PhoneNumber,
            'charge' => $faker->jobTitle.' Department'
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'camaleon@perro.cl',	//usuario incorrecto
            'password' => $user->password,	//password correcta
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionMissing($user->email);
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();

    }

    function testLoginUsuarioNoRegistrado(){
        
    	$faker = Faker::create();

        $user = factory(usr::class)->create([
            'lname' => $faker->lastName,
            'phone' => $faker->e164PhoneNumber,
            'charge' => $faker->jobTitle.' Department'
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'ecuentro@2mundos.cl',	//credenciales no registradas
            'password' => bcrypt('12345678'),
        ]);

    	$response->assertRedirect('/login');
        $response->assertSessionMissing($user->email);
        $response->assertSessionMissing($user->password);
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();

    }
}
