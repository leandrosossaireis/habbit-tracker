<?php

test('invalid credentials show an error message', function () {
    $response = $this->from('/login')->post('/login', [
        'email' => 'naoexiste@example.com',
        'password' => 'senha1234',
    ]);

    $response->assertRedirect('/login');
    $response->assertSessionHasErrors(['email' => 'Credenciais inválidas']);
});
