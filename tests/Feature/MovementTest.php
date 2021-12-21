<?php

use Tests\TestCase;

test('Testando o cadastro de um movimento', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
test('Listando os movimentos cadastrados', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
test('Cadastrando um novo usuario', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
test('Listando os usuarios cadastrados', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
test('Cadastrando uma nova pontuação para o usuario', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
test('Exibir as informações de um movimento e o rank por usuarios caso exista', function () {
    //expect()->
    /** @var TestCase $this */
    $response = $this->get('/api/rank-movement');
    $response->assertStatus(200);
    $response ->assertJson([
        'success' => true
    ]);
});
// test('Verefico se o endpoint /api/rank-movement retorna 200 e se o retorno do "success" é TRUE', function () {
//     //expect()->
//     /** @var TestCase $this */
//     $response = $this->get('/api/rank-movement');
//     $response->assertStatus(200);
//     $response ->assertJson([
//         'success' => true
//     ]);
// });


// test('Verefico se o endpoint /api/rank-movement/DEADLIFT retorna a lista ranqueada', function () {
//     //expect()->
//     /** @var TestCase $this */
//     $response = $this->get('/api/rank-movement/DEADLIFT');
//     $response->assertStatus(200);
//     $response ->assertJson([
//         'success' => true
//     ]);
// });
