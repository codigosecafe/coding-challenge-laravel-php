<?php

test('Cadastrando um novo usuario', function () {
    $response = $this->post(route('user.store'), ["name" => "Claudio"]);
    $response->assertStatus(201);
    $response->assertJsonPath('data.name_user', 'CLAUDIO');
});
test('Listar todos os usuarios', function () {
    $response = $this->get(route('user.index'));
    $response->assertStatus(200);
    $response->assertJson(['data' => [
            ['name_user' => 'JOAO'],
            ['name_user' => 'JOSE'],
            ['name_user' => 'PAULO'],
            ['name_user' => 'CLAUDIO']
    ]]);
});
test('Atualizar nome do usuario cadastrado', function () {
    $response = $this->json('PUT',route('user.update', ['user' => 4]), ['name' => 'Claudio Alexssandro']);
    $response->assertStatus(200);
    $response->assertJsonPath('data.name_user', 'CLAUDIO ALEXSSANDRO');
});
test('Visualizar os dados de um usuario por seu id', function () {
    $response = $this->json('GET',route('user.show', ['user' => 4]));
    $response->assertStatus(200);
    $response->assertJsonPath('data.name_user', 'CLAUDIO ALEXSSANDRO');
});

