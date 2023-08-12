<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\admin\DashboardController;

// Basic routes
Route::get('/', function () {
    return redirect('/Category/products');
});


Auth::routes();

// User, supplier, and admin routes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['user-role:user'])->group(function () {
        Route::get('user/home', [HomeController::class, 'userHome'])->name('home');
    });

    Route::middleware(['user-role:supplier'])->group(function () {
        Route::get('supplier/home', [HomeController::class, 'supplierHome'])->name('supdash');
    });

    Route::middleware(['user-role:admin'])->group(function () {
        Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::get('admin/chart',[ChartController::class,'ChartIndex'])->name('ChartIndex');
        route::get('admin/dashboard',[DashboardController::class,'dashboardindex'])->name('dashboardindex');
        Route::get('admin/userchart', [ChartController::class, 'userChart']);

    });

    // Cart and checkout routes
    Route::prefix('cart')->group(function () {
        Route::post('collection/products/{id}', [CartController::class, 'addcart'])->name('addtocart');
        Route::get('index', [CartController::class, 'index'])->name('cartindex');
        Route::get('{id}', [CartController::class, 'remove'])->name('deletecartitem');
        Route::patch('{id}', [CartController::class, 'updatecartItem'])->name('updatecartitem');
    });

    Route::prefix('checkout')->group(function () {
        Route::get('index', [CheckoutController::class, 'index'])->name('gocheckout');
        Route::post('place/order', [CheckoutController::class, 'checkOut'])->name('checkOut');

    });

    Route::prefix('vieworders')->group(function () {
        Route::get('index', [CheckoutController::class, 'orderView'])->name('Orders');
        Route::get('history', [CheckoutController::class, 'orderHistory'])->name('orderHistory');
        Route::post('cancel-order/{orderId}', [CheckoutController::class, 'cancelOrder'])->name('cancelOrders');
        Route::get('adminView', [CheckoutController::class, 'adminView'])->name('viewAllorders');
        Route::post('/confirm-order/{orderId}', [CheckoutController::class, 'confirmOrder'])->name('confirmOrders');
    });
});

// Brand CRUD routes
Route::prefix('brand')->group(function () {
    Route::get('index', [BrandController::class, 'index'])->name('viewbrands');
    Route::get('create', [BrandController::class, 'create'])->name('createbrands');
    Route::post('', [BrandController::class, 'store'])->name('addbrands');
    Route::get('{id}/edit', [BrandController::class, 'edit'])->name('editbrands');
    Route::post('{id}', [BrandController::class, 'update'])->name('updatebrands');
    Route::get('{id}', [BrandController::class, 'destroy'])->name('deletebrands');
});

// Home collection categories
Route::prefix('Category')->group(function () {
    Route::get('brandcategory', [CollectionController::class, 'index'])->name('brandcollection');
    Route::get('products', [CollectionController::class, 'productcollections'])->name('productcollection');
});

// Product CRUD routes
Route::prefix('product')->group(function () {
    Route::get('index', [ProductController::class, 'index'])->name('viewproducts');
    Route::get('create', [ProductController::class, 'create'])->name('createproducts');
    Route::post('', [ProductController::class, 'store'])->name('addproducts');
    Route::get('{id}/edit', [ProductController::class, 'edit'])->name('editproducts');
    Route::post('{id}', [ProductController::class, 'update'])->name('updateproducts');
    Route::delete('{id}', [ProductController::class, 'destroy'])->name('deleteproducts');
});

Route::get('search/result', [ProductController::class, 'search'])->name('productSearch');

// Shipping CRUD routes
Route::prefix('shipping')->group(function () {
    Route::get('index', [ShippingController::class, 'index'])->name('viewshippings');
    Route::get('create', [ShippingController::class, 'create'])->name('createshipping');
    Route::post('', [ShippingController::class, 'store'])->name('addShipping');
    Route::get('{id}/edit', [ShippingController::class, 'edit'])->name('editShipping');
    Route::post('{id}', [ShippingController::class, 'update'])->name('updateShipping');
    Route::get('{id}', [ShippingController::class, 'destroy'])->name('deleteShipping');
});

// Payment CRUD routes
Route::prefix('payment')->group(function () {
    Route::get('index', [PaymentController::class, 'index'])->name('viewpayments');
    Route::get('create', [PaymentController::class, 'create'])->name('createpayment');
    Route::post('', [PaymentController::class, 'store'])->name('addPayment');
    Route::get('{id}/edit', [PaymentController::class, 'edit'])->name('editPayment');
    Route::post('{id}', [PaymentController::class, 'update'])->name('updatePayment');
    Route::get('{id}', [PaymentController::class, 'destroy'])->name('deletePayment');
});






