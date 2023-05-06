<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Livewire\homeComponent;
use App\Http\Livewire\productPage;
use App\Http\Livewire\cartPage;
use App\Http\Livewire\checkoutPage;
use App\Http\Livewire\productDetailsPage;
// use App\Http\Livewire\searchPage;
// use App\Http\Livewire\UserDashboardPage;
// use App\Http\Livewire\AdminDashboardPage;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',homeComponent::class)->name('home.index');
Route::get('/product',productPage::class)->name('product');    //shop
Route::get('/cart',cartPage::class)->name('product.cart');  //shop.cart
Route::get('/checkout',checkoutPage::class)->name('product.checkout');
Route::get('/product/{ctg}',productDetailsPage::class)->name('product.details');
// Route::get('/search',searchPage::class)->name('product.search');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


// Route::middleware(['auth'])->group(function(){
//     Route::get('/user/dashboard',UserDashboardPage::class)->name('user.dashboard');
//     return view ('user.dashboard');
// });
// Route::middleware(['auth','authadmin'])->group(function(){
//     Route::get('/admin/dashboard',AdminDashboardPage::class)->name('admin.dashboard');
//     return view ('admin.dashboard');
// });


require __DIR__.'/auth.php';
