<?php

namespace Tests\Feature;

use Tests\TestCase;

class LivroTest extends TestCase
{
    public function test_listar_livros()
    {
        $response = $this->get('/livros');

        $response->assertStatus(200);
    }

    public function test_criar_livro()
    {
        $response = $this->post('/livros', [
            'titulo' => 'Livro Teste'
        ]);

        $response->assertStatus(302);
    }

    public function test_validacao_criar_livro()
    {
        $response = $this->post('/livros', []);

        $response->assertSessionHasErrors();
    }
}
