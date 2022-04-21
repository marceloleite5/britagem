<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\BalancasController;

Route::get('/dashboard/balancas', [BalancasController::class, 'index'])->middleware('auth');
Route::get('dashboard/balancas/create', [BalancasController::class, 'create'])->middleware('auth');
Route::any('balancas', [BalancasController::class, 'store'])->middleware('auth');
Route::get('dashboard/balancas/edit/{id}',[BalancasController::class, 'edit'])->middleware('auth');
Route::put('dashboard/balancas/update/{id}',[BalancasController::class, 'update'])->middleware('auth');
Route::delete('dashboard/balancas/{id}', [BalancasController::class, 'destroy'])->middleware('auth');
Route::get('dashboard/balancas/{id}', [BalancasController::class, 'show'])->middleware('auth');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth');

Route::get('dashboard/empresas', [EmpresasController::class, 'index'])->middleware('auth');
Route::get('dashboard/empresas/create', [EmpresasController::class, 'create'])->middleware('auth');
Route::any('empresas', [EmpresasController::class, 'store'])->middleware('auth');
Route::get('dashboard/empresas/edit/{id}',[EmpresasController::class, 'edit']);
Route::put('dashboard/empresas/update/{id}',[EmpresasController::class, 'update'])->middleware('auth');
Route::delete('dashboard/empresas/{id}', [EmpresasController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/vendas', [VendasController::class, 'index'])->middleware('auth');
Route::get('dashboard/vendas/create', [VendasController::class, 'create'])->middleware('auth');
Route::any('/vendas', [VendasController::class, 'store'])->middleware('auth');
Route::get('dashboard/vendas/edit/{id}', [VendasController::class, 'edit'])->middleware('auth');
Route::get('dashboard/vendas/{id}', [VendasController::class, 'show'])->middleware('auth');
Route::get('dashboard/vendas/editfrete/{id}',[VendasController::class, 'editfrete'])->middleware('auth');
Route::put('dashboard/vendas/updatefrete/{id}',[VendasController::class, 'updatefrete'])->middleware('auth');
Route::put('dashboard/vendas/update/{id}', [VendasController::class, 'update'])->middleware('auth');
Route::delete('dashboard/vendas/{id}', [VendasController::class, 'destroy'])->middleware('auth');
Route::get('dashboard/vendas/fechamento', [VendasController::class, 'fechamento'])->middleware('auth');



Route::get('/dashboard/produtos', [ProdutosController::class, 'index'])->middleware('auth');
Route::get('/dashboard/produtos/create', [ProdutosController::class, 'create'])->middleware('auth');
Route::get('/dashboard/produtos/edit/{id}', [ProdutosController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/produtos/update/{id}', [ProdutosController::class, 'update'])->middleware('auth');
Route::any('/produtos', [ProdutosController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/produtos/{id}',[ProdutosController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->middleware('auth');
Route::get('/dashboard/clientes/create',[ClientesController::class, 'create'])->middleware('auth');
Route::any('/clientes', [ClientesController::class, 'store'])->middleware('auth');
Route::get('/dashboard/clientes/edit/{id}', [ClientesController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/clientes/update/{id}', [ClientesController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/clientes/{id}', [ClientesController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/fornecedores', [FornecedoresController::class, 'index'])->middleware('auth');
Route::get('/dashboard/fornecedores/create', [FornecedoresController::class, 'create'])->middleware('auth');
Route::any('/fornecedores', [FornecedoresController::class, 'store'])->middleware('auth');
Route::get('/dashboard/fornecedores/edit/{id}',[FornecedoresController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/fornecedores/update/{id}', [FornecedoresController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/fornecedores/{id}',[FornecedoresController::class, 'destroy'])->middleware('auth');


Route::get('/', function () {
    return view('index');
});


