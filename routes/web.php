<?php

use App\Http\Livewire\Gallery\GalleryInfo;
use App\Http\Livewire\Gallery\ProjectMedia;
use App\Http\Livewire\Gallery\ProjectMenu;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Photo\PhotoUpload;
use App\Http\Livewire\Photo\PhotoUploadBatch;
use App\Http\Livewire\Photo\PhotoEdit;
use App\Http\Livewire\Project\ProjectCreate;
use App\Http\Livewire\Project\ProjectEdit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ProjectMenu::class)->name('gallery');
Route::get('/gallery/info', GalleryInfo::class)->name('gallery.info');
Route::get('/gallery/projecttype/{project_type}', ProjectMenu::class)->name('gallery.projecttype');
Route::get('/gallery/project/{project}', ProjectMedia::class)->name('gallery.project');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('projects-photos');
    })->name('dashboard');
    Route::get('/photos', function () {
        return view('livewire.photo.photo-index');
    })->name('photo.index');
    Route::get('/projects/{project}/photos/create', PhotoUpload::class)->name('photo.create');
    Route::get('/projects/{project}/photos/assign', PhotoUploadBatch::class)->name('photos.assign');
    Route::get('/photos/{photo}', PhotoEdit::class)->name('photo.edit');
    Route::get('/projects', function () {
        return view('projects-photos');
    })->name('project.index');
    Route::get('/projects/create', ProjectCreate::class)->name('project.create');
    Route::get('/projects/{project}', ProjectEdit::class)->name('project.edit');
});
