<?php

test('Cadastrando um novo registro pessoal de pontos', function () {
    $response = $this->post(route('personal-record.store'), [
        "user_id" => 4,
        "movement_id" => 4,
        "score" => 253.5,
    ]);
    $response->assertStatus(201);
    $response->assertJsonPath('data.name_user', 'CLAUDIO ALEXSSANDRO');
    $response->assertJsonPath('data.name_movement', 'KART DE DOMINGO');
    $response->assertJsonPath('data.score', 253.5);
});
test('Listar todos os registros pessoais de pontos', function () {
    $response = $this->get(route('personal-record.index'));
    $response->assertStatus(200);
    $response->assertJson(['data' => [
            [
                'name_user' => 'JOAO',
                'name_movement' => 'DEADLIFT',
                'score' => 100
            ]
    ]]);
});

test('Visualizar os dados de um registro pessoal de pontos por seu id', function () {
    $response = $this->json('GET',route('personal-record.show', ['personal_record' => 4]));
    $response->assertStatus(200);
    $response->assertJsonPath('data.name_user', 'JOAO');
    $response->assertJsonPath('data.name_movement', 'DEADLIFT');
    $response->assertJsonPath('data.score', 110);
});


