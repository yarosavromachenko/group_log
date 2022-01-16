<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;

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

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::group([
    'prefix' => 'students',
    'as' => 'student.',
], function () {
    Route::get('/{student}/{item}/student', [StudentController::class, 'create'])->name('create');
    Route::get('/{student}/{item}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{student}/{item}', [StudentController::class, 'update'])->name('update');
    Route::post('/{student}/{item}/student', [StudentController::class, 'store'])->name('store');
    Route::get('/{student}/send', [MailController::class, 'send'])->name('send');
});

