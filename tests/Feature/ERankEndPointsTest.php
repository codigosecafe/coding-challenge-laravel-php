<?php

test('Listar todos o rank dos usuarios e os movimentos, nesse caso valido apenas o primeiro retorno', function () {
    $response = $this->get(route('rank-movement.index'));
    $response->assertStatus(200);
    $response->assertJson(['data' => [
            [
                'movement' => 'DEADLIFT',
                'ranked_records' => 3,
                'rank' => [
                    [
                        'name_user' => 'JOSE',
                        'position' => 1,
                        'score' => 190,
                        'date_time' => '2021-01-06 03:00:00',
                        'date_time_formated' => '06/01/2021 03:00:00'
                    ]
                ],
            ]
    ]]);
});
test('Exibir o rank dos usuarios tendo como base de busca o nome do movimento', function () {
    $response = $this->get(route('rank-movement.show', ['rank_movement' => 'BACK SQUAT']));
    $response->assertStatus(200);
    $response->assertJson(['data' => [

                'movement' => 'BACK SQUAT',
                'ranked_records' => 3,
                'rank' => [
                    [
                        'name_user' => 'JOAO',
                        'position' => 1,
                        'score' => 130
                    ],
                    [
                        'name_user' => 'JOSE',
                        'position' => 1,
                        'score' => 130
                    ]
                ],

    ]]);
});
