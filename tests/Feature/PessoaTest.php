<?php

namespace Tests\Feature;

use Tests\TestCase;

class PessoaTest extends TestCase
{
    public function test_listar_pessoas()
    {
        $response = $this->get('/pessoas');

        $response->assertStatus(200);
    }

    public function test_tela_criar_pessoa()
    {
        $response = $this->get('/pessoas/create');

        $response->assertStatus(200);
    }

    public function test_rota_invalida_pessoas()
    {
        $response = $this->get('/pessoas/999999');

        $response->assertStatus(404);
    }
}