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

/* Get Culture By ID */
Route::post('/getCulture', [CultureController::class,'getCultureById'])->name('getCulture');

/* Add Culture */
Route::post('/addCulture', [CultureController::class,'addCulture'])->name('add');

/* Edit Culture */
Route::post('/editCulture', [CultureController::class,'editCulture'])->name('edit');

/* Delete Culture */
Route::post('/deleteCulture', [CultureController::class,'deleteCulture'])->name('delete');

/* Emergency Master */
Route::get('/emergency', [EmergencyController::class,'getEmergencyList'])->name('emergency');

/* Scholarship Master */
Route::get('/scholarship', [ScholarshipController::class,'getScholarshipList'])->name('scholarship');

/* Get Scholarship By ID */
Route::post('/getScholarship', [ScholarshipController::class,'getScholarshipById'])->name('getScholarship');

/* Add Scholarship */
Route::post('/addScholarship', [ScholarshipController::class,'addScholarship'])->name('add');

/* Edit Scholarship */
Route::post('/editScholarship', [ScholarshipController::class,'editScholarship'])->name('edit');

/* Delete Scholarship */
Route::post('/deleteScholarship', [ScholarshipController::class,'deleteScholarship'])->name('delete');