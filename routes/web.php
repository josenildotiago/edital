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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('site');
Route::get('/pdf', [App\Http\Controllers\SiteController::class, 'pdf'])->name('gerarPdf');
Route::get('/formulario', [App\Http\Controllers\SiteController::class, 'formulario'])->name('formulario');
Route::get('/feito', [App\Http\Controllers\SiteController::class, 'feito'])->name('feito');
Route::post('/enviarFormulario', [App\Http\Controllers\FormularioController::class, 'getForm'])->name('getForm');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create_user', [App\Http\Controllers\UserController::class, 'index'])->name('create.user');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/visualizar', [App\Http\Controllers\SolicitaController::class, 'index'])->name('visualiza.solicitacao');
Route::get('/visualizarCompleto/{id}', [App\Http\Controllers\SolicitaController::class, 'show'])->name('visualiza.completo');
Route::get('/update_password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update.password');
Route::put('/update_password', [App\Http\Controllers\UserController::class, 'editSenha'])->name('update.senha');
Route::post('/create_user', [App\Http\Controllers\UserController::class, 'create'])->name('register.user');
Route::get('/register_edital', [App\Http\Controllers\EditalController::class, 'index'])->name('register.edital');
Route::get('/items_edital', [App\Http\Controllers\EditalController::class, 'items'])->name('items.edital');
Route::post('/create', [App\Http\Controllers\EditalController::class, 'store'])->name('create.edital')->middleware(['auth']);
Route::put('/update_item', [App\Http\Controllers\EditalController::class, 'update'])->name('update.edital');