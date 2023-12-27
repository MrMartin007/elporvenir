<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController ;
use App\Http\Controllers\EmpresaController ;
use App\Http\Controllers\ChequeController ;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('marcas', MarcaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('cheques', ChequeController::class);


Route::get('/create/{id}', [ChequeController::class, 'create'])->name('cheques.create');


Route::get('/buscar', [ProductoController::class, 'buscar'])->name('buscar');
Route::get('/resultados', [ProductoController::class, 'resultados'])->name('resultados');
Route::put('/factura-cancelada/{id}', [FacturaController::class,'cancelado'])->name('factura-cancelada');
Route::put('/cheque-cancelada/{id}', [ChequeController::class,'cancelado'])->name('cheque-cancelada');

