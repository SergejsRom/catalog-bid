<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/catalog-bid/public/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/catalog-bid/public/livewire/livewire.js', $handle);
});