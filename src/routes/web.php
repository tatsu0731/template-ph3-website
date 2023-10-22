<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuizController;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// for_week40
Route::get('/admin', function() {
    return view('admin');
})->middleware('admin');


Route::get('/user', [TestController::class, 'test'])->name('test');

Route::get('/test', [TestController::class, 'test'])->name('test');

Route::get('/quiz', [QuizController::class, 'quiz'])->name('quiz');

// 個別表示用のルーティング設定

Route::get('/quizzes/{quizzes}', [QuizController::class, 'show'])->name('quizzes');

// 編集用のルート設定
// 編集用
Route::get('/quizzes/{quizzes}/edit', [QuizController::class, 'edit'])->name('edit')->middleware('can:edit_btn');
// 更新用
Route::patch('/quizzes/{quizzes}', [QuizController::class, 'update'])->name('update');

// 削除用のルート設定
Route::delete('/quiz', [QuizController::class, 'delete'])->name('destroy');


// タイトル修正時の個別表示用ルート
Route::get('/quizzes/title/{quizzes}', [QuizController::class, 'quizzes_title'])->name('title')->middleware('can:edit_btn');
Route::patch('/quizzes/title/{quizzes}/update', [QuizController::class, 'quizzes_title_update'])->name('title_update')->middleware('can:edit_btn');




Route::get('/posse', function () {
    return view('posse');
})->name('posse');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
