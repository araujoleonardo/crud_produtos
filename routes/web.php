<?php

use App\Http\Controllers\ProdutoController;
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

Route::get('/', [ProdutoController::class, 'index']);
 
Route::get('/show', [ProdutoController::class, 'getProdutos']);
 
Route::post('/store', [ProdutoController::class, 'store']);
 
Route::post('/destroy', [ProdutoController::class, 'destroy']);
 
Route::post('/update', [ProdutoController::class, 'update']);

Route::get('/search', [ProdutoController::class, 'search']);