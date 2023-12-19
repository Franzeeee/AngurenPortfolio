<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route For The Home Page //
Route::get('/', [PortfolioController::class, 'index'])->name('home');

//Route For Login
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Route For Edit Page //
Route::get('/edit', [PortfolioController::class, 'edit'])->name('edit')->middleware('auth');

Route::post('/updateHeader', [PortfolioController::class, 'updateHeader'])->name('update.header');
Route::post('/updateAbout', [PortfolioController::class, 'updateAbout'])->name('update.about');

Route::post('/addSkill', [PortfolioController::class, 'addSkill'])->name('add.skill');
Route::get('deleteSkill/{id}', [PortfolioController::class, 'deleteSkill'])->name('delete.skill');
