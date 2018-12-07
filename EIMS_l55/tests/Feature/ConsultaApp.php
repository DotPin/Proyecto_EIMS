<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User as usr;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsultaApp extends TestCase
{
    /**
     * A basic test example.
     *
     * return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    function testVerTrabajadores(){
    	$this->get('/admin/workers-list')
    		->assertStatus(200);
    }

    function testLoginCorrectoUsuario(){
    	
    	$user = factory(usr::class)->([
    		'email'=> 'netnavi@gmail.com',
    		'password' => bcrypt('12345678')
    	]);

    	$this->visit(route('login'))
    		->type($user->email,'email')
    		->type('12345678','password')
    		->press('Login')
    		->assertStatus(200);

    }

    function testLoginIncorrectoUsuario(){
    	
    	$user = factory(usr::class)->([
    		'email'=> 'netnavi@gmail.com',
    		'password' => bcrypt('12345678')
    	]);

    	//$this->be($user); metodo para corroborar login

    	$this->visit(route('login'))
    		->type($user->email,'email')
    		->type('123456','password')
    		->press('Login')
    		->assertStatus(500);

    }

    function testLoginUsuarioNoRegistrado(){
 
    	$this->visit(route('login'))
    		->type('usuario@no.registrado','email')
    		->type('123456','password')
    		->press('Login')
    		->assertStatus(500);

    }

    function testLoginUsuarioNoRegistrado(){
 
    	$this->visit(route('login'))
    		->type('usuario@no.registrado','email')
    		->type('123456','password')
    		->press('Login')
    		->assertStatus(500);

    }




}
