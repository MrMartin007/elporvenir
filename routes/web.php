<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController ;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpresaController ;
use App\Http\Controllers\ChequeController ;
use App\Http\Controllers\Auth\VerificationController;

// Rutas para la verificación de correo electrónico
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');


Route::get('/calendario', [App\Http\Controllers\HomeController::class, 'calendario'])->name('calendario');


Route::resource('marcas', MarcaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('cheques', ChequeController::class);


Route::get('/create/{id}', [ChequeController::class, 'create'])->name('cheques.create');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');

Route::get('/lista/{marca}', [App\Http\Controllers\ShopController::class, 'listaPorMarca'])->name('lista.marca');

Route::get('/lista', [App\Http\Controllers\ShopController::class, 'listaPorMarca'])->name('lista');


Route::get('/buscar', [ProductoController::class, 'buscar'])->name('buscar');
Route::get('/resultados', [ProductoController::class, 'resultados'])->name('resultados');
Route::put('/factura-cancelada/{id}', [FacturaController::class,'cancelado'])->name('factura-cancelada');
Route::put('/cheque-cancelada/{id}', [ChequeController::class,'cancelado'])->name('cheque-cancelada');



