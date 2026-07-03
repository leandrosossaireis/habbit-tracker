<?php

use App\Models\User;

test('invalid credentials show an error message', function () {
    $response = $this->from('/login')->post('/login', [
        'email' => 'naoexiste@example.com',
        'password' => 'senha1234',
    ]);

    $response->assertRedirect('/login');
    $response->assertSessionHasErrors(['email' => 'Credenciais inválidas']);
});

test('get logout is redirected to dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/logout');

    $response->assertRedirect('/dashboard');
});
