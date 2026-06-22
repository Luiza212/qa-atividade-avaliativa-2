<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BibliotecaTest extends TestCase
{
    use RefreshDatabase;

    public function test_listar_bibliotecas()
    {
        $response = $this->get('/bibliotecas');

        $response->assertStatus(200);
    }

    public function test_tela_criar_biblioteca()
    {
        $response = $this->get('/bibliotecas/new');

        $response->assertStatus(200);
    }

    public function test_criar_biblioteca_valida()
{
    $user = \App\Models\User::factory()->create();

    $response = $this->withoutMiddleware()
                     ->post('/bibliotecas/create', [
                         'created_by' => $user->id,
                         'nome' => 'Biblioteca Central',
                         'endereco' => 'Rua Principal, 123',
                     ]);

    $response->assertStatus(302);

    $this->assertDatabaseHas('bibliotecas', [
        'nome' => 'Biblioteca Central'
    ]);
}

   public function test_editar_biblioteca()
{
    $user = \App\Models\User::factory()->create();

    $this->withoutMiddleware()->post('/bibliotecas/create', [
        'created_by' => $user->id,
        'nome' => 'Biblioteca Original',
        'endereco' => 'Rua A, 1',
    ]);

    $biblioteca = \DB::table('bibliotecas')->first();

    $response = $this->withoutMiddleware()
                     ->put("/bibliotecas/update/{$biblioteca->id}", [
                         'created_by' => $user->id,
                         'nome' => 'Biblioteca Editada',
                         'endereco' => 'Rua B, 2',
                     ]);

    $response->assertStatus(302);

    $this->assertDatabaseHas('bibliotecas', [
        'nome' => 'Biblioteca Editada'
    ]);
}

   public function test_deletar_biblioteca()
{
    $user = \App\Models\User::factory()->create();

    $this->withoutMiddleware()->post('/bibliotecas/create', [
        'created_by' => $user->id,
        'nome' => 'Biblioteca Para Deletar',
        'endereco' => 'Rua C, 3',
    ]);

    $biblioteca = \DB::table('bibliotecas')->first();

    $response = $this->withoutMiddleware()
                     ->delete("/bibliotecas/delete/{$biblioteca->id}");

    $response->assertStatus(302);
}

    public function test_rota_inexistente_biblioteca()
    {
        $response = $this->get('/bibliotecas/9999');

        $response->assertStatus(404);
    }
}