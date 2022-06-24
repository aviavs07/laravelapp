<?php

use App\Events\ChatTask;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/broadcast', function () {
    broadcast(new ChatTask());
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chattask', [App\Http\Controllers\ChatTaskController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatTaskController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatTaskController::class, 'sendMessage']);
