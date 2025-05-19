<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\GhibliFilm;
use App\Livewire\GhibliFilmDetail;
use App\Livewire\GhibliPersonDetail;
use App\Livewire\GhibliSpeciesDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('/ghibli', GhibliFilm::class)->middleware('auth')->name('ghibli');
Route::get('/ghibli/{film}', GhibliFilmDetail::class)->middleware('auth')->name('ghibli.detail');
Route::get('/person/{person}', GhibliPersonDetail::class)->middleware('auth')->name('ghibli.person');
Route::get('/species/{species}', GhibliSpeciesDetail::class)->middleware('auth')->name('ghibli.species');



require __DIR__.'/auth.php';
