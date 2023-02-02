<?php

it('removes all media', function () {
    $this->artisan('media:erase')
        ->expectsConfirmation('Do you really want to erase ALL media and projects?', 'yes')
        ->assertSuccessful();

    $this->assertDatabaseCount('projects', 0)
        ->assertDatabaseCount('photos', 0)
        ->assertDatabaseCount('media', 0);

    $this->artisan('media:cleanup')
        ->expectsConfirmation('Found 0 leftover media folders. Do you really want to erase?', 'no')
        ->assertSuccessful();
});
