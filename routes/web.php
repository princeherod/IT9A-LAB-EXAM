<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return redirect()->route('characters.index');
});

Route::resource('characters', CharacterController::class);

// Confirm delete page
Route::get('characters/{character}/delete', [CharacterController::class, 'confirmDelete'])
    ->name('characters.confirmDelete');