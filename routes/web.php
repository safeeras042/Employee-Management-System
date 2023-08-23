<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\UserPanelController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->name('index');


// dashboard return logic in return view('welcome');
Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');


// checks the authenticated user is admin and proceeds
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin');
    Route::get('/create-user', [AdminPanelController::class, 'showCreateForm'])->name('create-user');
    Route::post('/create-user', [AdminPanelController::class, 'store'])->name('store-user');
    Route::delete('/delete-user/{id}', [AdminPanelController::class, 'deleteUser'])->name('delete-user');
    Route::get('/edit-user/{id}', [AdminPanelController::class, 'showEditForm'])->name('edit-user');
    Route::put('/update-user/{id}', [AdminPanelController::class, 'updateUser'])->name('update-user');
});

// checks if the user is authenticated

Route::get('/user-panel', [UserPanelController::class, 'index'])->name('user-panel');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
