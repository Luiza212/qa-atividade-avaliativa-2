<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsuarioTest extends TestCase
{
    public function test_listar_usuarios()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
    }

    public function test_tela_criar_usuario()
    {
        $response = $this->get('/usuarios/create');

        $response->assertStatus(200);
    }

    public function test_rota_inexistente_usuario()
    {
        $response = $this->get('/usuarios/9999');

        $response->assertStatus(404);
    }
}