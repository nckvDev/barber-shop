<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HairController;
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

Route::get('/', [HairController::class, 'home'])->name('home');


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {

  Route::get('admin/dashboard', function () {
    return view('dashboard');
  })->middleware(['auth', 'verified'])->name('admin.dashboard');

  Route::get('/admin', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
  Route::get('/admin/hair-manage', [AdminController::class, 'Hair'])->name('admin.hair-manage');
  Route::post('/admin/add', [AdminController::class, 'store'])->name('addHair');
  Route::get('/admin/add-hair', [AdminController::class, 'add'])->name('add-Hair');
  Route::get('view/{id}', [AdminController::class, 'view']);
  Route::get('/admin/hair-edit/{id}', [AdminController::class, 'edit']);
  Route::post('/admin/hair-update/{id}', [AdminController::class, 'update']);
  Route::get('/admin/hair-delete/{id}', [AdminController::class, 'delete']);

  Route::get('/admin/shop-manage', [AdminController::class, 'Shop'])->name('admin.shop-manage');
  Route::post('/admin/add-shop', [AdminController::class, 'storeShop'])->name('addShop');
});


Route::get('hair/{id}', [HairController::class, 'hair']);

Route::get('/shop', [HairController::class, 'shop']);
Route::get('/shop/{id}', [HairController::class, 'shopDetail']);
Route::get('/shop/{id}/review', [HairController::class, 'shopReview']);

Route::post('/shop/{id}/review', [HairController::class, 'storeReview'])->name('addReview');
