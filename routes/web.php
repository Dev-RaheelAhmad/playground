<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('about', 'livewire.pages.about')->name('about');
Route::view('contact', 'livewire.pages.contact')->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
