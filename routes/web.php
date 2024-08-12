<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;

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
Route::get('producto/editar/{id}', [ProductoController::class, 'edit'])->name('producto.editar')->middleware('auth');
Route::get('producto/actualizar/{id}', [ProductoController::class, 'update'])->name('producto.actualizar')->middleware('auth');
Route::patch('/producto/{id}/desactivar', [ProductoController::class, 'desactivar'])->name('producto.desactivar');

Route::get('venta', [VentaController::class, 'index'])->name('venta.index')->middleware('auth');
Route::get('venta/crear', [VentaController::class, 'create'])->name('venta.crear')->middleware('auth');

//Route::get('login', [AuthController::class, 'showLoginForm'])->name('ingreso');
Route::post('login', [AuthController::class, 'login'])->name('ingreso');
Route::get('logout', [AuthController::class, 'logout'])->name('cerrar_sesion');

//Route::resource('proveedor', ProveedorController::class);
Route::get('proveedor', [ProveedorController::class, 'index'])->name('proveedor.index')->middleware('auth');
Route::post('proveedor/store', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('proveedor/crear', [ProveedorController::class, 'create'])->name('proveedor.crear')->middleware('auth');

//Route::resource('marca', MarcaController::class);
Route::get('marca', [MarcaController::class, 'index'])->name('marca.index')->middleware('auth');
Route::post('marca/store', [MarcaController::class, 'store'])->name('marca.store');
Route::get('marca/crear', [MarcaController::class, 'create'])->name('marca.crear')->middleware('auth');

/*Route::get('/proveedor', function () {
    return view('proveedor.index');
})->name('proveedor')->middleware('auth');*/

Route::get('/proveedor/crear', function () {
    return view('proveedor.crear');
})->name('proveedor.crear')->middleware('auth');

Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index')->middleware('auth');
Route::post('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('categoria/crear', [CategoriaController::class, 'create'])->name('categoria.crear')->middleware('auth');