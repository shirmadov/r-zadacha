<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/',[NewsController::class, 'index'])->name('/');
Route::post('view_more',[NewsController::class, 'viewMore'])->name('view_more');
Route::get('news/{slug?}',[NewsController::class, 'show'])->name('news');
Route::get('tags/{id?}',[NewsController::class, 'searchByTag'])->name('tags');
Route::post('comment',[NewsController::class, 'comment'])->name('comment')->middleware('auth');
Route::post('search',[NewsController::class, 'search'])->name('search');
Route::get('news_write',[NewsController::class, 'writeNews'])->name('news.write')->middleware('auth');
Route::get('news_list',[NewsController::class, 'listNews'])->name('news.list')->middleware('auth');
Route::post('news_store',[NewsController::class, 'storeNews'])->name('news.store')->middleware('auth');
Route::get('news_edit/{id?}',[NewsController::class, 'editNews'])->name('news.edit')->middleware('auth');
Route::post('news_update',[NewsController::class, 'updateNews'])->name('news.update')->middleware('auth');
Route::get('news_delete/{id?}',[NewsController::class, 'deleteNews'])->name('news.delete')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
