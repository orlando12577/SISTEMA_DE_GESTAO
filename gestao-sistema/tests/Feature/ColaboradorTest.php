<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ColaboradorTest extends TestCase
{
    public function test_colaborador_criado_com_sucesso()
{
    $this->withoutExceptionHandling(); // opcional, facilita debugar erros

    // Cria uma unidade fictícia
    $unidade = Unidade::factory()->create();

    // Dados do colaborador
    $dados = [
        'nome' => 'Fulano',
        'email' => 'fulano@teste.com',
        'cpf' => '11111111111', // remover pontos e traços para passar na validação
        'unidade_id' => $unidade->id,
    ];

    // Faz o POST para a rota de criação de colaboradores
    $response = $this->post('/colaboradores', $dados);

    // Verifica se houve redirecionamento (sucesso)
    $response->assertRedirect();

    // Verifica se o colaborador foi realmente criado no banco
    $this->assertDatabaseHas('colaboradores', [
        'email' => 'fulano@teste.com',
        'cpf' => '11111111111',
    ]);
}

}
