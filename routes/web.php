<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HairController;
use App\Http\Controllers\SearchController;
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
  Route::get('view/{id}', [AdminController::class, 'view']);
  // image
  Route::post('/admin/image-upload', [AdminController::class, 'imageUpload'])->name('imageUpload');
  Route::get('/admin/image-remove/{id}', [AdminController::class, 'imageRemove']);
  Route::get('/admin/image-style-remove/{id}', [AdminController::class, 'imageStyleRemove']);
  Route::get('/admin/image-color-remove/{id}', [AdminController::class, 'imageColorRemove']);
  Route::get('/admin/image-care-remove/{id}', [AdminController::class, 'imageCareRemove']);
  Route::get('/admin/image-products-remove/{id}', [AdminController::class, 'imageProductsRemove']);
  Route::get('/admin/image-video-remove/{id}', [AdminController::class, 'imageVideoRemove']);

  // hair
  Route::get('/admin/hair-manage', [AdminController::class, 'Hair'])->name('admin.hair-manage');
  Route::get('/admin/add-hair', [AdminController::class, 'add'])->name('admin.add-hair');
  Route::post('/admin/add', [AdminController::class, 'store'])->name('addHair');
  Route::get('/admin/hair-edit/{id}', [AdminController::class, 'edit'])->name('admin.edit-hair');
  Route::post('/admin/hair-update/{id}', [AdminController::class, 'update']);
  Route::get('/admin/hair-delete/{id}', [AdminController::class, 'delete'])->name('hair.delete');

  // hair-style
  Route::get('/admin/hair-style', [AdminController::class, 'HairStyle'])->name('admin.hair-style');
  Route::get('/admin/add-hair-style', [AdminController::class, 'addStyle'])->name('admin.add-hair-style');
  Route::post('/admin/add-style', [AdminController::class, 'storeStyle'])->name('add-style');
  Route::get('/admin/hair-style-edit/{id}', [AdminController::class, 'editStyle'])->name('admin.edit-hair-style');
  Route::post('/admin/hair-style-update/{id}', [AdminController::class, 'updateStyle']);
  Route::get('/admin/hair-style-delete/{id}', [AdminController::class, 'delete'])->name('hair-style.delete');

  // hair-color
  Route::get('/admin/hair-color', [AdminController::class, 'HairColor'])->name('admin.hair-color');
  Route::get('/admin/add-hair-color', [AdminController::class, 'addColor'])->name('admin.add-hair-color');
  Route::post('/admin/add-color', [AdminController::class, 'storeColor'])->name('add-color');
  Route::get('/admin/hair-color-edit/{id}', [AdminController::class, 'editColor'])->name('admin.edit-hair-color');
  Route::post('/admin/hair-color-update/{id}', [AdminController::class, 'updateColor']);
  Route::get('/admin/hair-color-delete/{id}', [AdminController::class, 'delete'])->name('hair-color.delete');

  // hair-care
  Route::get('/admin/hair-care', [AdminController::class, 'HairCare'])->name('admin.hair-care');
  Route::get('/admin/add-hair-care', [AdminController::class, 'addCare'])->name('admin.add-hair-care');
  Route::post('/admin/add-care', [AdminController::class, 'storeCare'])->name('add-care');
  Route::get('/admin/hair-care-edit/{id}', [AdminController::class, 'editCare'])->name('admin.edit-hair-care');
  Route::post('/admin/hair-care-update/{id}', [AdminController::class, 'updateCare']);
  Route::get('/admin/hair-care-delete/{id}', [AdminController::class, 'delete'])->name('hair-care.delete');

  // hair-products
  Route::get('/admin/hair-products', [AdminController::class, 'HairProducts'])->name('admin.hair-products');
  Route::get('/admin/add-hair-products', [AdminController::class, 'addProducts'])->name('admin.add-hair-products');
  Route::post('/admin/add-products', [AdminController::class, 'storeProducts'])->name('add-products');
  Route::get('/admin/hair-products-edit/{id}', [AdminController::class, 'editProducts'])->name('admin.edit-hair-products');
  Route::post('/admin/hair-products-update/{id}', [AdminController::class, 'updateProducts']);
  Route::get('/admin/hair-products-delete/{id}', [AdminController::class, 'delete'])->name('hair-products.delete');

  // hair-video
  Route::get('/admin/hair-video', [AdminController::class, 'HairVideo'])->name('admin.hair-video');
  Route::get('/admin/add-hair-video', [AdminController::class, 'addVideo'])->name('admin.add-hair-video');
  Route::post('/admin/add-video', [AdminController::class, 'storeVideo'])->name('add-video');
  Route::get('/admin/hair-video-edit/{id}', [AdminController::class, 'editVideo'])->name('admin.edit-hair-video');
  Route::post('/admin/hair-video-update/{id}', [AdminController::class, 'updateVideo']);
  Route::get('/admin/hair-video-delete/{id}', [AdminController::class, 'delete'])->name('hair-video.delete');

  // shop
  Route::get('/admin/shop-manage', [AdminController::class, 'Shop'])->name('admin.shop-manage');
  Route::post('/admin/addShop', [AdminController::class, 'storeShop'])->name('addShop');
  Route::get('/admin/add-shop', [AdminController::class, 'addShop'])->name('add-Shop');
  Route::get('/admin/shop-edit/{id}', [AdminController::class, 'editShop'])->name('edit-shop');
  Route::post('/admin/shop-update/{id}', [AdminController::class, 'updateShop']);
  Route::get('/admin/shop-delete/{id}', [AdminController::class, 'deleteShop']);
});


Route::get('hair/{id}', [HairController::class, 'hair']);

Route::get('hairs', [HairController::class, 'hairs']);
Route::get('hairs-style', [HairController::class, 'hairsStyle']);
Route::get('hairs-color', [HairController::class, 'hairsColor']);
Route::get('hairs-care', [HairController::class, 'hairsCare']);
Route::get('hairs-product', [HairController::class, 'hairsProduct']);

Route::get('/shop', [HairController::class, 'shop']);
Route::get('/shop/{id}', [HairController::class, 'shopDetail']);
Route::get('/shop/{id}/review', [HairController::class, 'shopReview']);

Route::post('/shop/{id}/review', [HairController::class, 'storeReview'])->name('addReview');

Route::controller(SearchController::class)->group(function(){
  Route::get('demo-search', 'index');
  Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
