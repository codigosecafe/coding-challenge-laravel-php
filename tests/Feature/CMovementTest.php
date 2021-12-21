<?php

test('Cadastrando um novo movimento', function () {
    $response = $this->post(route('movement.store'), ["name" => "Corrida Maluca"]);
    $response->assertStatus(201);
    $response->assertJsonPath('data.name', 'CORRIDA MALUCA');
});
test('Listar todos os movimentos', function () {
    $response = $this->get(route('movement.index'));
    $response->assertStatus(200);
    $response->assertJson(['data' => [
            ['name' => 'DEADLIFT'],
            ['name' => 'BACK SQUAT'],
            ['name' => 'BENCH PRESS'],
            ['name' => 'CORRIDA MALUCA']
    ]]);
});
test('Atualizar nome do movimento cadastrado', function () {
    $response = $this->json('PUT',route('movement.update', ['movement' => 4]), ['name' => 'Kart de domingo']);
    $response->assertStatus(200);
    $response->assertJsonPath('data.name', 'KART DE DOMINGO');
});
test('Visualizar os dados de um movimento por seu id', function () {
    $response = $this->json('GET',route('movement.show', ['movement' => 4]));
    $response->assertStatus(200);
    $response->assertJsonPath('data.name', 'KART DE DOMINGO');
});


