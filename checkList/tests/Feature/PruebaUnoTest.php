<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PruebaUnoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_register(){

        Artisan::call('migrate');
        //El formulario carga correctamente
        // carga esta ruta espera respest
        $carga = $this->get(route('register'));
        // si craga la pagina y se encuentre la palabra registrsse en la pagina
        $carga->assertStatus(200)->assertSee('Register');

        //registro incorrecto
        // $registroMal = $this->post(route('do-register'),["email"=>"aaa","password"=>"123"]);
        // $registroMal->assertStatus(302)->assertRedirect(route('register'))
        // ->assertSessionHasErrors([
        //     'email'=> __('validation.email',['attribute'=>'email']),
        //     'name' => __('validation.required',['attribute'=>'name']),
        //     'password'=>__('validation.min.string',['attribute'=>'password',"min"=>6])
        // ]);

        //registro correcto
        
        //registro repetido
    }
}
