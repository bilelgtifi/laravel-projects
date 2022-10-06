<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// auth
Auth::routes();

// welcome
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/aboute', [App\Http\Controllers\HomeController::class, 'aboute'])->name('aboute');

// profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// certificates
Route::get('/certificates', [App\Http\Controllers\CertificatController::class, 'index'])->name('certificates');
Route::post('/certificates/like', [App\Http\Controllers\CertificatController::class, 'like'])->name('certificates.like');
Route::post('/certificates/dislike', [App\Http\Controllers\CertificatController::class, 'dislike'])->name('certificates.dislike');
Route::get('/certificates/show/{id}', [App\Http\Controllers\CertificatController::class, 'show'])->name('certificates.show');
Route::post('/certificates/delete/{id}', [App\Http\Controllers\CertificatController::class, 'delete'])->name('certificates.delete');

// likes/comments
Route::resource('comments','App\Http\Controllers\CommentController');
Route::resource('likes','App\Http\Controllers\LikeController');
Route::post('/comments/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comments.delete');

//admin
Route::get('/admin/dashboarde', [App\Http\Controllers\AdminController::class, 'dashboarde'])->name('admin.dashboarde');
Route::get('/admin/create/certificate', [App\Http\Controllers\AdminController::class, 'certificate'])->name('admin.certificate');
Route::put('/admin/create/certificate/store', [App\Http\Controllers\AdminController::class, 'store_certife'])->name('admin.store_certife');
Route::put('/admin/certificate/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/find', [App\Http\Controllers\AdminController::class, 'find_user'])->name('admin.find_user');
Route::get('/admin/users/delete', [App\Http\Controllers\AdminController::class, 'delete_users'])->name('admin.delete_user');
Route::post('/admin/role/down', [App\Http\Controllers\AdminController::class, 'down'])->name('admin.down');
Route::post('/admin/role/up', [App\Http\Controllers\AdminController::class, 'up'])->name('admin.up');
