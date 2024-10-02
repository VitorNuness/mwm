<?php

use function Pest\Laravel\{assertAuthenticated, assertDatabaseCount, assertDatabaseHas, post, seed};

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
    post('/login')
        ->assertOk();
});

it('should be can authenticate with email and password', function () {
    post('/login', [
        'email'    => 'simoni@email.com',
        'password' => 'simoni1234',
    ]);

    assertAuthenticated();
});
