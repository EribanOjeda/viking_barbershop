<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\GaleriaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('clientes', ClienteController::class)->except(['show']);

Route::get('reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('reservas/crear', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::patch('reservas/{reserva}/estado', [ReservaController::class, 'updateEstado'])->name('reservas.estado');
Route::delete('reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

Route::get('galeria', [GaleriaController::class, 'index'])->name('galeria.index');


use App\Http\Controllers\BuscadorController;
Route::get('buscar', [BuscadorController::class, 'index'])->name('buscar');


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\MiCuentaController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('auth.login.show');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/registro', [RegisterController::class, 'showRegister'])->name('auth.register.show');
Route::post('/registro', [RegisterController::class, 'register'])->name('auth.register');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Admin area
Route::middleware(['auth', \App\Http\Middleware\EnsureRole::class.':admin'])->group(function () {
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/crear', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/editar', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::middleware(['auth', \App\Http\Middleware\EnsureRole::class.':admin'])->group(function () {
    // ...
    Route::get('galeria/crear', [\App\Http\Controllers\GaleriaController::class, 'create'])->name('galeria.create');
    Route::post('galeria', [\App\Http\Controllers\GaleriaController::class, 'store'])->name('galeria.store');

    // ✨ Añade estas:
    Route::get('galeria/{foto}/editar', [\App\Http\Controllers\GaleriaController::class, 'edit'])->name('galeria.edit');
    Route::put('galeria/{foto}', [\App\Http\Controllers\GaleriaController::class, 'update'])->name('galeria.update');
    Route::delete('galeria/{foto}', [\App\Http\Controllers\GaleriaController::class, 'destroy'])->name('galeria.destroy');
});


    // Galería: subir imágenes
    Route::get('galeria/crear', [\App\Http\Controllers\GaleriaController::class, 'create'])->name('galeria.create');
    Route::post('galeria', [\App\Http\Controllers\GaleriaController::class, 'store'])->name('galeria.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/mi-cuenta/reservas', [MiCuentaController::class, 'misReservas'])->name('cuenta.reservas');
});
