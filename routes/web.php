<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
// -------------------- Home/Index Route --------------------------------
Route::get('/', [ListingController::class, 'index'])->name('index');

// -------------------- Single Listing Route ---------------------------------
Route::get('/listing/{id}', [ListingController::class, 'singleListing'])->name('single');

// -------------------------- Create Listing Route ------------------------
Route::get('/create', [ListingController::class, 'create'])->name('create')->middleware('auth');
Route::post('/create', [ListingController::class, 'store'])->middleware('auth');

// --------------------- Edit Listing Route -----------------------
Route::get('/listing/edit/{id}', [ListingController::class, 'edit'])->name('edit')->middleware('auth');

//---------------------- Update Listing Route --------------------
Route::put('/listing/edit/{id}', [ListingController::class, 'update'])->middleware('auth');

// --------------------- Delete Listing Route ---------------------
Route::delete('/listing/delete/{id}', [ListingController::class, 'destroy'])->middleware('auth');

// --------------------- Register User Route -----------------------------
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'postRegistration']);



// completion of user registration
// Route::get('/passcreate', [UserController::class, 'passCreate'])->name('passCreate');


Route::get('account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');
Route::post('account/verify/{token}', [UserController::class, 'verification']);

// ------------------------ Login User Route -----------------------------
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

//  ----------------------- Logout user Route ---------------------------
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// ------------------------ Dashboard ---------------------------------
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
