<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
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
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy'); // Burada Silme İşlemi için show metodu yerine destroy metoduna yönlendiriyoruz.s
    Route::get('quizzes/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy'); // Burada Silme İşlemi için show metodu yerine destroy metoduna yönlendiriyoruz.s
    Route::resource('quizzes', QuizController::class);
    Route::resource('quizzes/{quiz_id}/questions', QuestionController::class);
});
