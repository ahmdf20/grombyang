<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\RestrictedProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('catalog');
    Route::get('/my/profile', 'profile')->name('profile')->middleware('auth');
    Route::get('/front/product/detail/{uuid}', 'product_detail')->name('front.product-detail');
    Route::get('/my/order', 'orders')->name('my-order');
    Route::get('/my/order/detail/{uuid}', 'order')->name('my-order.detail');

    Route::put('/my/profile/update', 'update')->name('profile.update');
    Route::put('/my/profile/update-password', 'update_password')->name('profile.update-password');

    Route::put('/my/transaction/checkout/{transaction}', 'checkout')->name('transaction.checkout');
});

Route::controller(RajaOngkirController::class)->group(function () {
    Route::get('/raja-ongkir/province', 'province')->name('raja-ongkir.province');
    Route::get('/raja-ongkir/city/{id}', 'city')->name('raja-ongkir.city');
    Route::get('/raja-ongkir/shipping/{city}/{weight}/{shipping}', 'shipping')->name('raja-ongkir.shipping');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/credentials', 'credentials')->name('credentials');
    Route::post('/registration', 'registration')->name('registration');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('/register/email-verification/{id}/{token}/{method}', 'email_verification')->name('email-verification');
});

Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(ProductController::class)->middleware(['auth'])->group(function () {
    Route::get('/product', 'index')->name('product.index');
    Route::get('/product/bin', 'bin')->name('product.bin');
    Route::get('/product/restricted', 'product_restricted')->name('product.restricted');
    Route::get('/product/sales-report', 'product_sales_report')->name('psr.index');
    Route::get('/product/add', 'add')->name('product.add');
    Route::get('/product/detail/{uuid}', 'detail')->name('product.detail');
    Route::get('/product/edit/{uuid}', 'edit')->name('product.edit');

    Route::put('/product/update/{uuid}', 'update')->name('product.update');

    Route::post('/product/store', 'store')->name('product.store');

    Route::delete('/product/delete/{uuid}', 'delete')->name('product.delete');

    Route::put('/product/stock/{uuid}', 'stock')->name('product.stock');

    Route::put('/product/restore/{uuid}', 'restore')->name('product.restore');
    Route::delete('/product/permanent/{uuid}', 'permanent')->name('product.permanent');
});

Route::controller(CategoryController::class)->middleware(['auth', 'authorization:admin,super-admin'])->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::get('/category/add', 'add')->name('category.add');
    Route::get('/category/edit/{uuid}', 'edit')->name('category.edit');

    Route::put('/category/update/{uuid}', 'update')->name('category.update');

    Route::post('/category/store', 'store')->name('category.store');

    Route::delete('/category/delete/{uuid}', 'delete')->name('category.delete');
});

Route::controller(OrderController::class)->middleware(['auth', 'authorization:seller,customer'])->group(function () {
    Route::get('/order', 'index')->name('order.index');

    Route::post('/order/store/{product}', 'store')->name('order.store');

    Route::post('/order/checkout/{transaction}', 'checkout')->name('order.checkout');
});

Route::controller(AdminController::class)->middleware(['auth', 'authorization:super-admin'])->group(function () {
    Route::get('/admin', 'index')->name('admin.index');
    Route::get('/admin/add', 'add')->name('admin.add');
    Route::get('/admin/edit/{uuid}', 'edit')->name('admin.edit');
    Route::get('/admin/edit/password/{uuid}', 'edit_password')->name('admin.edit-password');

    Route::put('/admin/update/{uuid}', 'update')->name('admin.update');
    Route::put('/admin/update/password/{uuid}', 'update_password')->name('admin.update-password');

    Route::post('/admin/store', 'store')->name('admin.store');

    Route::delete('/admin/delete/{uuid}', 'delete')->name('admin.delete');
});

Route::controller(CSController::class)->group(function () {
    Route::get('/cs', 'index')->name('cs.index');
    Route::get('/cs/add', 'add')->name('cs.add');
    Route::get('/cs/edit/{uuid}', 'edit')->name('cs.edit');
    Route::get('/cs/edit/password/{uuid}', 'edit_password')->name('cs.edit-password');

    Route::put('/cs/update/{uuid}', 'update')->name('cs.update');
    Route::put('/cs/update/password/{uuid}', 'update_password')->name('cs.update-password');

    Route::post('/cs/store', 'store')->name('cs.store');

    Route::delete('/cs/delete/{uuid}', 'delete')->name('cs.delete');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer', 'index')->name('customer.index');

    Route::put('/customer/restrict/{uuid}', 'restrict')->name('customer.restrict');
    Route::put('/customer/unrestrict/{uuid}', 'unrestrict')->name('customer.unrestrict');
});

Route::controller(SellerController::class)->group(function () {
    Route::get('/seller', 'index')->name('seller.index');

    Route::put('/seller/restrict/{uuid}', 'restrict')->name('seller.restrict');
    Route::put('/seller/unrestrict/{uuid}', 'unrestrict')->name('seller.unrestrict');
});

Route::controller(RestrictedProductController::class)->group(function () {
    Route::get('/restricted-product', 'index')->name('product-restricted.index');

    Route::put('/restricted-product/block/{uuid}', 'block')->name('product-restricted.block');
    Route::put('/restricted-product/unblock/{uuid}', 'unblock')->name('product-restricted.unblock');
});

Route::controller(CartController::class)->middleware('auth')->middleware('authorization:seller,customer')->group(function () {
    Route::get('/cart', 'index')->name('cart.index');

    Route::post('/cart/store/{product}', 'store')->name('cart.store');

    Route::delete('/cart/delete/{uuid}', 'delete')->name('cart.delete');
});

Route::controller(WishlistController::class)->middleware('auth')->middleware('authorization:seller,customer')->group(function () {
    Route::get('/wishlist', 'index')->name('wishlist.index');

    Route::delete('/wishlist/delete/{uuid}', 'delete')->name('wishlist.delete');

    Route::post('/wishlist/store/{product}', 'store')->name('wishlist.store');
});

Route::controller(TransactionController::class)->middleware(['auth'])->group(function () {
    Route::get('/transaction/detail/{uuid}')->name('transaction.detail');
    // Route::post('/transaction/checkout/{transaction}', 'checkout')->name('transaction.checkout');
});
