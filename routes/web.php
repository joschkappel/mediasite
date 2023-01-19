<?php

use App\Http\Livewire\Photo\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Photo\PhotoUpload;
use App\Http\Livewire\Photo\PhotoEdit;

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

Route::get('/', Gallery::class)->name('gallery');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/stock/photo', function () { return view('livewire.photo.photo-index'); })->name('photo.index');
    Route::get('/stock/photo/create', PhotoUpload::class)->name('photo.create');
    Route::get('/stock/photo/{photo}', PhotoEdit::class)->name('photo.edit');
    Route::get('/project', function () { return view('projects-photos'); })->name('project.index');
    Route::get('/project/create', PhotoUpload::class)->name('project.create');
//    Route::get('/project/{project}', ProjectEdit::class)->name('project.edit');

});
