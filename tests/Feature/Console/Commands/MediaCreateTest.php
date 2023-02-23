<?php

it('creates default media', function () {

    $this->artisan('media:create')
        ->assertSuccessful();
    $this->assertDatabaseCount('projects', 2);
});
it('creates 1 project with 1 photo media', function () {

    $this->artisan('media:create -P 1')
        ->assertSuccessful();
    $this->assertDatabaseCount('projects', 1);
});
