<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\ScholarshipController;

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
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class,'index'])->name('home');

// Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* Admin Master */
Route::get('/admin', [AdminController::class,'getAdminList'])->name('admin');

/* Get Admin By ID */
Route::post('/getAdmin', [AdminController::class,'getAdminById'])->name('getadmin');

/* Add Admin */
Route::post('/addAdmin', [AdminController::class,'addAdmin'])->name('add');

/* Edit Admin */
Route::post('/editAdmin', [AdminController::class,'editAdmin'])->name('edit');

/* Delete Admin */
Route::post('/deleteAdmin', [AdminController::class,'deleteAdmin'])->name('delete');

/* Culture Master */
Route::get('/culture', [CultureController::class,'getCultureList'])->name('culture');

/* Emergency Master */
Route::get('/emergency', [EmergencyController::class,'getEmergencyList'])->name('emergency');

/* Scholarship Master */
Route::get('/scholarship', [ScholarshipController::class,'getScholarshipList'])->name('scholarship');