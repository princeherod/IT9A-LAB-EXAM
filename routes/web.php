<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return redirect()->route('characters.index');
});

Route::resource('characters', CharacterController::class);