<?php

test('Criando a base de dados de teste')->tap(fn() => $this->artisan('migrate:fresh --seed'))
->assertDatabaseHas('user', ['id' => 1]);
