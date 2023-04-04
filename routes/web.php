<?php

use App\Http\Controllers\laravelCrudControler;
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
Route::get('/crud',[laravelCrudControler::class,'index'])->name('index.crud');
Route::post('/crud/store',[laravelCrudControler::class,'store'])->name('store.crud');
Route::get('/crud/{id}/edit',[laravelCrudControler::class,'edit'])->name('edit.crud');

Route::post('/update/{id}',[laravelCrudControler::class,'update'])->name('update.crud');
Route::get('/crud/delete/{id}',[laravelCrudControler::class,'destroy'])->name('destroy.crud');

