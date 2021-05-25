<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;

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

Route::group(['middlaware' => 'auth'], function(){
    Route::get('panel', [MainController::class , 'dashboard'])->name('dashboard');
    Route::get('quiz/detay/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [MainController::class, 'result'])->name('quiz.result');
});

// BURADA auth ve isAdmin ise içerideki fonksiyonlar çalışacak.
//prefix == route ye isim veriyoruz.
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy'); // Burada Silme İşlemi için show metodu yerine destroy metoduna yönlendiriyoruz.s
    Route::get('quizzes/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy'); // Burada Silme İşlemi için show metodu yerine destroy metoduna yönlendiriyoruz.s
    Route::resource('quizzes', QuizController::class);
    Route::resource('quizzes/{quiz_id}/questions', QuestionController::class);
});
