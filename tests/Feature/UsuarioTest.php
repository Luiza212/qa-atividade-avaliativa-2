<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsuarioTest extends TestCase
{
    public function test_listar_usuarios()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_tela_criar_usuario()
    {
        $response = $this->get('/users/create');

        $response->assertStatus(200);
    }

    public function test_rota_inexistente_usuario()
    {
        $response = $this->get('/users/9999');

        $response->assertStatus(302);
    }
}