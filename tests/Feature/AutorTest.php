<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutorTest extends TestCase
{
    use RefreshDatabase;

    // LISTAGEM
    public function test_listar_autores()
    {
        $response = $this->get('/autores');
        $response->assertStatus(200);
    }

    // TELA DE CRIAR
    public function test_tela_criar_autor()
    {
        $response = $this->get('/autores/create');
        $response->assertStatus(200);
    }

    // CRIAR VÁLIDO
    public function test_criar_autor_valido()
    {
        $response = $this->withoutMiddleware()
                         ->post('/autores', [
                             'nome'            => 'Machado de Assis',
                             'nacionalidade'   => 'Brasileiro',
                             'data_nascimento' => '1839-06-21',
                         ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('autores', ['nome' => 'Machado de Assis']);
    }

    // CRIAR SEM DADOS OBRIGATÓRIOS
    public function test_criar_autor_sem_dados()
    {
        $response = $this->withoutMiddleware()
                         ->post('/autores', []);

        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('autores', ['nome' => '']);
    }

    // EDITAR
    public function test_editar_autor()
    {
        $this->withoutMiddleware()->post('/autores', [
            'nome'            => 'Autor Original',
            'nacionalidade'   => 'Brasileiro',
            'data_nascimento' => '1900-01-01',
        ]);

        $autor = \DB::table('autores')->first();

        $response = $this->withoutMiddleware()
                         ->put("/autores/update/{$autor->id}", [
                             'nome'            => 'Autor Editado',
                             'nacionalidade'   => 'Português',
                             'data_nascimento' => '1900-01-01',
                         ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('autores', ['nome' => 'Autor Editado']);
    }


    // ROTA INEXISTENTE
    public function test_rota_inexistente()
    {
        $response = $this->get('/rota-inexistente');
        $response->assertStatus(404);
    }
}