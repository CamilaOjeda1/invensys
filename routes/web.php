<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

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
})->name('recupera');

Route::get('/usuarios/crear', function () {
    return view('administracion.usuarios/crear');
})->name('usuarios.crear');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio')->middleware('auth');

//Route::resource('producto', ProductoController::class);
Route::get('producto', [ProductoController::class, 'index'])->name('producto.index')->middleware('auth');
Route::post('producto/store', [ProductoController::class, 'store'])->name('producto.store');
Route::get('producto/crear', [ProductoController::class, 'create'])->name('producto.crear')->middleware('auth');

Route::get('venta', [VentaController::class, 'index'])->name('venta.index')->middleware('auth');
Route::get('venta/crear', [VentaController::class, 'create'])->name('venta.crear')->middleware('auth');

//Route::get('login', [AuthController::class, 'showLoginForm'])->name('ingreso');
Route::post('login', [AuthController::class, 'login'])->name('ingreso');
Route::get('logout', [AuthController::class, 'logout'])->name('cerrar_sesion');

//Route::resource('proveedor', ProveedorController::class);
Route::get('proveedor', [ProductoController::class, 'index'])->name('proveedor.index')->middleware('auth');
Route::post('proveedor/store', [ProductoController::class, 'store'])->name('proveedor.store');
Route::get('proveedor/crear', [ProductoController::class, 'create'])->name('proveedor.crear')->middleware('auth');