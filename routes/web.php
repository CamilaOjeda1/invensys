<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', function () {
    return view('login');
});
Route::get('/usuarios/lista', function () {
    return view('administracion.usuarios/lista');
})->name('usuarios.lista');
Route::get('/recupera', function () {
    return view('recupera');
});
Route::get('/usuarios/crear', function () {
    return view('administracion.usuarios/crear');
})->name('usuarios.crear');
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');