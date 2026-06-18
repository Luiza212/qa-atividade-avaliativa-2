<?php

namespace Tests\Feature;

use Tests\TestCase;

class BibliotecaTest extends TestCase
{
    public function test_listar_bibliotecas()
    {
        $response = $this->get('/bibliotecas');

        $response->assertStatus(200);
    }

    public function test_tela_criar_biblioteca()
    {
        $response = $this->get('/bibliotecas/create');

        $response->assertStatus(200);
    }

    public function test_rota_inexistente_biblioteca()
    {
        $response = $this->get('/bibliotecas/9999');

        $response->assertStatus(404);
    }
}