<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RetiroController;
use App\Http\Controllers\VentaController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::prefix('inventario')->group(function () {
        Route::name('inventario.')->group(function () {
            Route::controller(ProductoController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/crearproducto', 'create')->name('create');
                Route::post('/guardar', 'store')->name('store');
                Route::get('/{producto}/editar', 'edit')->name('edit');
                Route::delete('/{producto}/eliminar', 'destroy')->name('delete');
            });
        });
    });

    Route::prefix('proveedor')->group(function () {
        Route::name('proveedor.')->group(function () {
            Route::controller(ProveedorController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/crearproveedor', 'create')->name('create');
                Route::post('/guardar', 'store')->name('store');
                Route::get('/{proveedor}/editar', 'edit')->name('edit');
                Route::put('/{proveedor}/actualizar', 'update')->name('update');
                Route::delete('/{proveedor}/eliminar', 'destroy')->name('delete');
            });
        });
    });

    Route::get('/ingresos/index', [IngresoController::class, 'index'])->name('ingresos.index');

    Route::get('/retiros/index', [RetiroController::class, 'index'])->name('retiros.index');

    Route::get('/ventas/index', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
});
