<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    private function criarAutor()
    {
        $this->withoutMiddleware()->post('/autores', [
            'nome'            => 'Autor Teste',
            'nacionalidade'   => 'Brasileiro',
            'data_nascimento' => '1900-01-01',
        ]);
        return \DB::table('autores')->first()->id;
    }

    // LISTAGEM
    public function test_listar_livros()
    {
        $response = $this->get('/livros');
        $response->assertStatus(200);
    }

    // TELA DE CRIAR
    public function test_tela_criar_livro()
    {
        $response = $this->get('/livros/create');
        $response->assertStatus(200);
    }

    // CRIAR VÁLIDO
    public function test_criar_livro()
    {
        $autorId = $this->criarAutor();

        $response = $this->withoutMiddleware()
                         ->post('/livros', [
                             'titulo'          => 'Dom Casmurro',
                             'isbn'            => '9788535902778',
                             'data_publicacao' => '1899-01-01',
                             'autor_id'        => $autorId,
                         ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('livros', ['titulo' => 'Dom Casmurro']);
    }

    // EDITAR
    public function test_editar_livro()
    {
        $autorId = $this->criarAutor();

        $this->withoutMiddleware()->post('/livros', [
            'titulo'          => 'Livro Original',
            'isbn'            => '1111111111111',
            'data_publicacao' => '2000-01-01',
            'autor_id'        => $autorId,
        ]);

        $livro = \DB::table('livros')->first();

        $response = $this->withoutMiddleware()
                         ->put("/livros/update/{$livro->id}", [
                             'titulo'          => 'Livro Editado',
                             'isbn'            => '2222222222222',
                             'data_publicacao' => '2001-01-01',
                             'autor_id'        => $autorId,
                         ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('livros', ['titulo' => 'Livro Editado']);
    }

    // DELETAR
    public function test_deletar_livro()
    {
        $autorId = $this->criarAutor();

        $this->withoutMiddleware()->post('/livros', [
            'titulo'          => 'Livro Para Deletar',
            'isbn'            => '3333333333333',
            'data_publicacao' => '2000-01-01',
            'autor_id'        => $autorId,
        ]);

        $livro = \DB::table('livros')->first();

        $response = $this->withoutMiddleware()
                         ->delete("/livros/{$livro->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('livros', ['titulo' => 'Livro Para Deletar']);
    }

    // ROTA INEXISTENTE
    public function test_rota_inexistente_livro()
    {
        $response = $this->get('/livros/9999');
        $response->assertStatus(404);
    }
}
