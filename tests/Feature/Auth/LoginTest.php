<?php

use function Pest\Laravel\{assertAuthenticated, assertDatabaseCount, assertDatabaseHas, assertGuest, post, seed};

beforeEach(function () {
    seed();
});

test('can create an user when seeding the database', function () {
    assertDatabaseCount('users', 1);
    assertDatabaseHas('users', [
        'name'  => 'Simoni Nunes da Silva',
        'email' => 'simoni@email.com',
    ]);
});

it('should be can access the login route', function () {
    post('/login', [
        'email'    => 'simoni@email.com',
        'password' => 'simoni1234',
    ])
        ->assertOk();
});

it('should be can authenticate with email and password', function () {
    post('/login', [
        'email'    => 'simoni@email.com',
        'password' => 'simoni1234',
    ]);

    assertAuthenticated();
});

it('be cant authenticate with invalid credentials', function () {
    post('/login', [
        'email'    => 'example@email.com',
        'password' => 'simoni123',
    ]);

    assertGuest();
});

test('retrieve an message informing the authenticate failed', function () {
    $response = post('/login', [
        'email'    => 'example@email.com',
        'password' => 'simoni123',
    ]);

    $response->assertSessionHasErrors([
        "login" => "O e-mail ou senha informados estão incorretos.",
    ]);
});

test('credentials validation', function ($field, $value, $message) {
    $response = post('/login', [
        $field => $value,
    ]);

    $response->assertInvalid([
        $field => $message,
    ]);
})->with([
    'email::required'    => ['email', '', 'Este campo deve ser preenchido.'],
    'email::email'       => ['email', 'email.com', 'Preencha este campo com um e-mail válido.'],
    'password::required' => ['password', '', 'Este campo deve ser preenchido.'],
]);
