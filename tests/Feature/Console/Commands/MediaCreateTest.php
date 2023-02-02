<?php

it('creates default media', function () {

    $this->artisan('media:create')
        ->assertSuccessful();
    $this->assertDatabaseCount('projects', 2)
        ->assertDatabaseCount('photos', 10);
});
it('creates 1 project with 1 photo media', function () {

    $this->artisan('media:create -R 1 -P 1')
        ->assertSuccessful();
    $this->assertDatabaseCount('projects', 1)
        ->assertDatabaseCount('photos', 1);
});
