<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CardTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_create_card()
    {
        $data = ['title' => 'My Card test'];

        $response = $this->postJson('/api/cards', $data);
        // Verifica: respuesta HTTP tenga un estado 200 OK.
        // respuesta JSON tenga un título igual al título enviado
        $response
            ->assertStatus(200)
            ->assertJson(['title' => 'My Card test']);
        // creado un nuevo objeto Card en la base de datos con el título proporcionado
        $this->assertDatabaseHas('cards', ['title' => 'My Card test']);
    }



}
