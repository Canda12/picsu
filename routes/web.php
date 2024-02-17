<?php

use App\Models\Foto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;


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
    return view('dashboard', [
        'fotos' => Foto::orderBy('id', 'DESC')->get(), 
    ]);
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'fotos' => Foto::orderBy('id', 'DESC')->get(), 
    ]);
})->name('dashboard');

Route::post('/foto/{foto}/like', [FotoController::class, 'like'])->name('foto.like');

Route::get('/foto/{foto}/show', [FotoController::class, 'show'])->name('foto.show');
Route::get('/foto/{foto}/like', [FotoController::class, 'like'])->name('foto.like');
Route::post('/foto/{foto}/comment', [FotoController::class, 'comment'])->name('foto.comment');  

Route::middleware(['auth'])->group(function () {
    Route::controller(AlbumController::class)->group(function () {
        Route::get('/album', 'index')->name('album.index'); 
        Route::get('/album/create', 'create')->name('album.create');
        Route::get('/album/{album}/edit', 'edit')->name('album.edit'); 
        Route::get('/album/{album}/delete', 'delete')->name('album.delete'); 
        Route::post('/album', 'store')->name('album.store'); 
        Route::put('/album/{album}', 'update')->name('album.update'); 
    }); 

    Route::controller(FotoController::class)->group(function () {
        Route::get('/foto', 'index')->name('foto.index'); 
        Route::get('/foto/create', 'create')->name('foto.create');
        Route::get('/foto/{foto}/edit', 'edit')->name('foto.edit'); 
        Route::get('/foto/{foto}/delete', 'delete')->name('foto.delete'); 
        Route::post('/foto', 'store')->name('foto.store'); 
        Route::put('/foto/{foto}', 'update')->name('foto.update'); 
    }); 

    Route::controller(Controller::class)->group(function (){
        Route::post('/foto/{foto}/like', [LikeController::class, 'create'])->name('foto.like');
        Route::get('/comments/{comment}/show', [CommentController::class, 'index'])->name('comments.show');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    });
}); 

require __DIR__.'/auth.php';
