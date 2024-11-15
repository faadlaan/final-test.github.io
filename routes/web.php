<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Models\Level;
use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user
    Route::get('/user', [DataController::class,'index'])->name('user');
    Route::get('/user-add', [DataController::class,'create'])->name('user.add');
    Route::post('/user', [DataController::class,'store'])->name('user.store');
    Route::get('/user-edit/{id}', [DataController::class, 'edit'])->name('user.edit');
    Route::put('/user-update/{id}', [DataController::class, 'update'])->name('user.update');
    Route::get('/user-delete/{id}', [DataController::class, 'delete'])->name('user.delete');
    Route::delete('/user-destroy/{id}', [DataController::class, 'destroy'])->name('user.destroy');

    //level
    Route::get('/level-user', [LevelController::class,'index'])->name('level');
    Route::get('/level-add', [LevelController::class,'create'])->name('level.add');
    Route::post('/level', [LevelController::class,'store'])->name('level.store');
    Route::get('/level-edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/level-update/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::get('/level-delete/{id}', [LevelController::class, 'delete'])->name('level.delete');
    Route::delete('/level-destroy/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
});






Route::get('/abc',[function () {
    return view('dashboard');
}]);