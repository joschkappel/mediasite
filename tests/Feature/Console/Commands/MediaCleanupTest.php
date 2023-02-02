<?php

use App\Models\Project;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

it('does not remove in use media', function () {
    $this->artisan('media:erase')
        ->expectsConfirmation('Do you really want to erase ALL media and projects?', 'yes')
        ->assertSuccessful();
    $this->artisan('media:create -R 1 -P 1')
        ->assertSuccessful();
    $this->artisan('media:cleanup')
        ->expectsConfirmation('Found 0 leftover media folders. Do you really want to erase?', 'no')
        ->doesntExpectOutput('No leftover folders found')
        ->assertSuccessful();
});
it('does remove leftover media', function () {
    $this->artisan('media:erase')
        ->expectsConfirmation('Do you really want to erase ALL media and projects?', 'yes')
        ->assertSuccessful();
    $this->artisan('media:create -R 1 -P 1')
        ->assertSuccessful();

    // delete project and photo
    $this->assertDatabaseCount('projects', 1)
        ->assertDatabaseCount('photos', 1);
    Photo::whereNotNull('id')->delete();
    Project::whereNotNull('id')->delete();
    DB::table('media')->delete();
    $this->assertDatabaseCount('projects', 0)
        ->assertDatabaseCount('photos', 0)
        ->assertDatabaseCount('media', 0);

    $this->artisan('media:cleanup')
        ->expectsConfirmation('Found 1 leftover media folders. Do you really want to erase?', 'yes')
        ->doesntExpectOutput('No leftover folders found')
        ->expectsOutputToContain('Removing folder')
        ->assertSuccessful();
});
