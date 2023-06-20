<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\homeComponent;
use App\Http\Livewire\productPage;
use App\Http\Livewire\cartPage;
use App\Http\Livewire\checkoutPage;
use App\Http\Livewire\productDetailsPage;
use App\Http\Livewire\menPage;
use App\Http\Livewire\womenPage;
use App\Http\Livewire\gardenPage;
use App\Http\Livewire\bookPage;
use App\Http\Livewire\kategori;
use App\Http\Livewire\searchPage;
use App\Http\Livewire\User\UserDashboardPage;
use App\Http\Livewire\Admin\AdminDashboardPage;
use App\Http\Livewire\Admin\AdminCtg;
use App\Http\Livewire\Admin\AdminAddCtg;
use App\Http\Livewire\Admin\EditCtg;
use App\Http\Livewire\Admin\AdminProduct;
use App\Http\Livewire\Admin\AdminOrder;
use App\Http\Livewire\Admin\EditOrder;
use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\AdminSubc;
use App\Http\Livewire\Admin\AddSubc;
use App\Http\Livewire\Admin\EditSubc;
use App\Http\Livewire\DonatePage;
use App\Http\Livewire\DonateBerjaya;
use App\Http\Livewire\UserProfile;
use App\Http\Livewire\PaymentPage;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Livewire\OrderHistory;


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
Route::get('/menlothing',menPage::class)->name('product.men'); 
Route::get('/home&garden',gardenPage::class)->name('product.garden'); 
Route::get('/books',bookPage::class)->name('product.book'); 
Route::get('/product-category/{ctg}', Kategori::class)->name('product.category');
Route::get('/search',SearchPage::class)->name('product.search');
Route::get('/donate', DonatePage::class)->name('donate');
Route::get('/berjayadonate', DonateBerjaya::class)->name('donate.berjaya');
Route::get('/payment', PaymentPage::class)->name('payment');
Route::get('/user/profile', UserProfile::class)->name('user.profile');
Route::get('/order-history', OrderHistory::class)->name('orderHistory');


//Controller for Stripe
Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession']);



Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard',UserDashboardPage::class)->name('user.dashboard');
    Route::get('/search',SearchPage::class)->name('product.search');
    
    
});
Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardPage::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCtg::class)->name('admin.categories');
    Route::get('/admin/add-category',AdminAddCtg::class)->name('admin.category.add');
    Route::get('/admin/edit-category/{ctgId}',EditCtg::class)->name('admin.category.edit');
    Route::get('/admin/subcategories',AdminSubc::class)->name('admin.subcategories');
    Route::get('/admin/add-subcategory',AddSubc::class)->name('admin.subcategory.add');
    Route::get('/admin/edit-subcategory/{subcId}',EditSubc::class)->name('admin.subcategory.edit');
    Route::get('/admin/products',AdminProduct::class)->name('admin.products');
    Route::get('/admin/product/add',AddProduct::class)->name('admin.product.add');
    Route::get('/admin/product/edit{productId}',EditProduct::class)->name('admin.product.edit');
    Route::get('/admin/order',AdminOrder::class)->name('admin.order');
    Route::get('/admin/edit-order{orderId}',EditOrder::class)->name('admin.order.edit');
    Route::get('/search',SearchPage::class)->name('product.search');

    
});


require __DIR__.'/auth.php';
