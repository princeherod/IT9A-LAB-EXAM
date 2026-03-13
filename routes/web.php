<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('characters.index');
});

Route::resource('characters', CharacterController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']);