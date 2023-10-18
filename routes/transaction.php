<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\TransactionController;

Route::middleware('auth')->group(function () {

    Route::get('/transaction/{id}', [TransactionController::class, 'addItem'])->name('transaction.addItem');
    Route::delete('/transaction/delete', [TransactionController::class, 'deleteItem'])->name('transaction.delete');
    Route::put('/transaction/update', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('transaction',[TransactionController::class,'index'])->name('transaction.index');
});
