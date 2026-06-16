<?php

namespace Tests\Feature;

use Tests\TestCase;

class AutorTest extends TestCase
{
    public function test_listar_autores()
    {
        $response = $this->get('/autores');

        $response->assertStatus(200);
    }

    public function test_tela_criar_autor()
    {
        $response = $this->get('/autores/create');

        $response->assertStatus(200);
    }

    public function test_rota_inexistente()
    {
        $response = $this->get('/rota-inexistente');

        $response->assertStatus(404);
    }
}