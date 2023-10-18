<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\ProductCategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\SupplierController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\JobController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\CustomerController;

Route::middleware('auth')->group(function () {
    //category product
    Route::get('product-category/list', [ProductCategoryController::class, 'list'])->name('product-category.json.list');
    Route::get('product-category/get-options', [ProductCategoryController::class, 'getOptions'])->name('product-category.get-options');
    Route::resource('/product-category', ProductCategoryController::class);

    //category products
    Route::get('product/list', [ProductController::class, 'list'])->name('product.json.list');
    Route::get('product/get-options', [ProductController::class, 'getOptions'])->name('product.get-options');
    Route::put('product/stock/{product}', [ProductController::class, 'stock'])->name('product.stock');
    Route::resource('/product', ProductController::class);

    //suppliers
    Route::get('supplier/list', [SupplierController::class, 'list'])->name('supplier.json.list');
    Route::resource('/supplier', SupplierController::class);

    //employees
    Route::get('employee/list', [EmployeeController::class, 'list'])->name('employee.json.list');
    Route::resource('/employee', EmployeeController::class);

    //customers
    Route::get('customer/list', [CustomerController::class, 'list'])->name('customer.json.list');
    Route::get('customer/get-options', [CustomerController::class, 'getOptions'])->name('customer.get-options');
    Route::resource('/customer', CustomerController::class);

    //job
    Route::get('job/list', [JobController::class, 'list'])->name('job.json.list');
    Route::get('job/get-options', [JobController::class, 'getOptions'])->name('job.get-options');
    Route::resource('/job', JobController::class);

    //order
    Route::get('order/list', [OrderController::class, 'list'])->name('order.json.list');
    Route::resource('/order', OrderController::class);
});
