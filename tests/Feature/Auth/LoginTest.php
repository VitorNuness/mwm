<?php

use function Pest\Laravel\{assertDatabaseCount, assertDatabaseHas, seed};

test('can create an user when seeding the database', function () {
    seed();

    assertDatabaseCount('users', 1);
    assertDatabaseHas('users', [
        'name'  => 'Simoni Nunes da Silva',
        'email' => 'simoni@email.com',
    ]);
});
