<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CuadroController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\BiografiaController;
use App\Http\Controllers\LiteraturaController;
use App\Http\Controllers\ComentarioController;

Route::get('/', [BlogController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');



Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::get('/cuadros', [CuadroController::class, 'index'])->name('cuadros');
Route::get('/cuadros/{cuadro}', [CuadroController::class, 'show'])->name('cuadros.show');



Route::get('/biografia', [BiografiaController::class, 'index'])->name('biografia');

Route::get('/perfil', [BlogController::class, 'verPerfil'])->name('verPerfil');
Route::put('/perfil', [BlogController::class, 'actualizarPerfil'])->name('perfil.actualizar');
Route::put('/perfil/avatar', [BlogController::class, 'actualizarAvatar'])->name('perfil.actualizar.avatar');




Route::get('/cuadrocrear', [CuadroController::class, 'create'])->middleware('auth')->name('cuadros.create');
Route::post('/cuadros', [CuadroController::class, 'store'])->middleware('auth')->name('cuadros.store');
Route::get('/cuadros/{cuadro}/editar', [CuadroController::class, 'edit'])->middleware('auth')->name('cuadros.edit');
Route::put('/cuadros/{cuadro}', [CuadroController::class, 'update'])->middleware('auth')->name('cuadros.update');
Route::delete('/cuadros/{cuadro}', [CuadroController::class, 'destroy'])->middleware('auth')->name('cuadros.destroy');


Route::get('/RelatosyMicrorrelatos', [LiteraturaController::class, 'indexRelatoMicrorrelato'])->name('RelatoMicrorrelato');
Route::get('/libros/relatos', [LiteraturaController::class, 'indexRelatoMicrorrelato'])->name('libros.relatoMicrorrelato');
Route::get('/libros/poesia', [LiteraturaController::class, 'poesiaindex'])->name('libros.poesiaindex');
Route::get('/poesia', [LiteraturaController::class, 'poesiaindex'])->name('poesia');
Route::get('/libros/{libro}', [LiteraturaController::class, 'show'])->name('libros.show');
Route::get('/libroscreate', [LiteraturaController::class, 'create'])->name('libros.create');
Route::post('/libros', [LiteraturaController::class, 'store'])->name('libros.store');
Route::get('/libros/{libro}/edit', [LiteraturaController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{libro}', [LiteraturaController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LiteraturaController::class, 'destroy'])->name('libros.destroy');




Route::get('/premios', [BlogController::class, 'premios'])->name('premios');

Route::post('/comentario/{id}/like', [ComentarioController::class, 'toggleLike'])->name('comentario.like');

Route::post('/cuadro/{cuadro}/comentario', [ComentarioController::class, 'store'])->name('comentario.store');


Route::post('/comentario/{id}/like', [ComentarioController::class, 'toggleLike'])->name('comentario.like');
Route::post('/cuadro/{cuadro}/comentario', [ComentarioController::class, 'store'])->name('comentario.store')->middleware('auth');
Route::post('/libros/{libro}/comentarios', [ComentarioController::class, 'store'])->name('comentario.libro.store');
Route::post('/comentarios/{comentario}/like', [ComentarioController::class, 'toggleLike'])->name('comentario.like');


Route::get('/contacto', [BlogController::class, 'contacto'])->name('contacto');
Route::get('/sobre-mi', [App\Http\Controllers\BlogController::class, 'sobremi'])->name('sobremi');
