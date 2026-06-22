<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PessoaTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_criar_pessoa_valida()
    {
        $response = $this->withoutMiddleware()
                         ->post('/pessoas', [
                             'name' => 'Maria Silva',
                             'email' => 'maria@email.com',
                             'password' => 'senha12345',
                             'confirmPassword' => 'senha12345',
                             'matricula' => '20240001',
                             'telefone' => '11999999999',
                         ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('pessoas', [
            'email' => 'maria@email.com'
        ]);
    }

    public function test_editar_pessoa()
    {
        $this->withoutMiddleware()->post('/pessoas', [
            'name' => 'Pessoa Original',
            'email' => 'original@email.com',
            'password' => 'senha12345',
            'confirmPassword' => 'senha12345',
            'matricula' => '20240001',
            'telefone' => '11999999999',
        ]);

        $pessoa = \DB::table('pessoas')->first();

        $response = $this->withoutMiddleware()
                         ->put("/pessoas/{$pessoa->id}", [
                             'name' => 'Pessoa Editada',
                             'email' => 'editada@email.com',
                             'matricula' => '20240002',
                             'telefone' => '11888888888',
                         ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('pessoas', [
            'name' => 'Pessoa Editada'
        ]);
    }

    
}