<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use App\Http\Middleware\is_admin;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/ourproduct', [productController::class, 'index'])->name('ourproduct');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/display-product/{product:id}', [productController::class, 'display']);

    Route::POST('/addcart/{id}', [productController::class, 'Addcart'])->name('Add.to.cart');
    Route::get('/shopping-cart', [productController::class, 'Cart'])->name('shopping.cart');
    Route::delete('/delete-cart-product', [productController::class, 'deleteProduct'])->name("delete.cart.product");

    
    Route::get('/checkout', [productController::class, 'checkout'])->name('check.out');
    Route::get('/invoice/{orderId}', [productController::class, 'placeOrder'])->name('place.order');

    Route::get('/invoice/{orderId}/generate', [productController::class, 'downloadInvoice'])->name('download.invoice');
    Route::get('/view-invoices', [productController::class, 'viewInvoices'])->name('view.invoices');
    Route::get('/receipt/{orderId}', [productController::class, 'receipt'])->name('after.order');
    Route::delete('/clear-cart', [ProductController::class, 'clearCart'])->name('clear.cart');

    Route::middleware([is_admin::class . ':admin'])->group(function(){
        Route::get('/display-user', [userController::class, 'displayUser'])->name('display.user');
        Route::DELETE('/delete-user', [userController::class, 'deleteUser'])->name('delete.user');

        Route::get('/create-category', [categoryController::class, 'createCategory'])->name('createcategory');
        Route::POST('/store-category', [categoryController::class, 'store']);
        Route::get('/categories', [categoryController::class, 'index'])->name('categories');
        Route::delete('/delete-category', [categoryController::class, 'delete'])->name('delete.category');

        Route::get('/create-product', [productController::class, 'createProduct'])->name('addproduct');
        Route::POST('/store-product', [productController::class, 'store']);
        Route::get('/edit-product/{product:id}', [productController::class, 'edit']);
        Route::PATCH('/update-product/{product:id}', [productController::class, 'update']);
        Route::DELETE('/delete-product', [productController::class, 'delete'])->name('delete.product');

    });

});

Route::fallback(function () {
    return redirect()->route('dashboard');
});


