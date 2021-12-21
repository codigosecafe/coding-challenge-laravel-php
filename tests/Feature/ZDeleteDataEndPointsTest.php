<?php

test('Deleta um usuario por seu id', function () {
    $response = $this->json('DELETE',route('user.destroy', ['user' => 4]));
    $response->assertStatus(200);
    $response->assertJsonPath('message', 'Registro CLAUDIO ALEXSSANDRO deletado com sucesso!');
});
test('Deleta um movimento usando ID como referencia seu id', function () {
    $response = $this->json('DELETE',route('movement.destroy', ['movement' => 4]));
    $response->assertStatus(200);
    $response->assertJsonPath('message', 'Registro KART DE DOMINGO deletado com sucesso!');
});
