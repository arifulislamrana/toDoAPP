<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
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

Route::prefix('/tasks')->group(function() {

    Route::get('/', [App\Http\Controllers\TaskController::class, 'list'])
        ->name('task.all');

    Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])
        ->name('task.create');

    Route::post('/create', [App\Http\Controllers\TaskController::class, 'save'])
        ->name('task.save');

    Route::get('/{id}', [App\Http\Controllers\TaskController::class, 'edit'])
        ->name('task.edit');

    Route::post('/{id}', [App\Http\Controllers\TaskController::class, 'update'])
        ->name('task.update');

    Route::get('/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete'])
        ->name('task.delete');

    Route::post('/{id}/complete', [App\Http\Controllers\TaskController::class, 'complete'])
        ->name('task.complete');
});
