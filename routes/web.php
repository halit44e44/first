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

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');

// BURADA auth ve isAdmin ise içerideki fonksiyonlar çalışacak.
//prefix == route ye isim veriyoruz.
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function(){
    Route::get('deneme' , function() {
        return "Midelleeeee test";
    });
});