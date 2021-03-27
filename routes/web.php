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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Categories Routes
Route::get('/list-categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('list-categories');
Route::get('/create-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
Route::post('/save-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('save-category');
Route::get('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
Route::put('/update-category', [App\Http\Controllers\CategoryController::class, 'update'])->name('update-category');
Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete-category');

// Entries types Routes
Route::get('/list-entriestypes', [App\Http\Controllers\EntryTypeController::class, 'index'])->name('list-entriestypes');
Route::get('/create-entrytype', [App\Http\Controllers\EntryTypeController::class, 'create'])->name('create-entrytype');
Route::post('/save-entrytype', [App\Http\Controllers\EntryTypeController::class, 'store'])->name('save-entrytype');
Route::get('/edit-entrytype/{id}', [App\Http\Controllers\EntryTypeController::class, 'edit'])->name('edit-entrytype');
Route::put('/update-entrytype', [App\Http\Controllers\EntryTypeController::class, 'update'])->name('update-entrytype');