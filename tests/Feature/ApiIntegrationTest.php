<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ApiIntegrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_listar_bibliotecas()
    {
        $response = $this->get('/bibliotecas');

        $response->assertStatus(200);
    }

    public function test_rota_de_cadastro_abre()
    {
        $user = User::factory()->create();

        $dados = [
            'created_by' => $user->id,
            'nome' => 'Biblioteca Teste'
        ];

        $response = $this->post('/bibliotecas/create', $dados);

        $response->assertStatus(302);
    }

    public function test_rota_inexistente()
    {
        $response = $this->get('/rota-inexistente');

        $response->assertStatus(404);
    }

    public function test_criar_biblioteca_salva_no_banco()
    {
        $user = User::factory()->create();

        $dados = [
            'created_by' => $user->id,
            'nome' => 'Biblioteca Teste DB',
            'endereco' => 'Rua do Teste, 123'
        ];

        $response = $this->post('/bibliotecas/create', $dados);

        $response->assertStatus(302);

        $this->assertDatabaseHas('bibliotecas', [
            'nome' => 'Biblioteca Teste DB',
            'created_by' => $user->id
        ]);
    }
}