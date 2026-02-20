<?php

use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $categories=Category::get();
    $order=Order::get();
    return view('home.child',compact('categories','order'));
});
Route::post('orders/save', [OrderController::class, 'store'])->name('order#save');
Route::get('createPage',[CategoryController::class,'createPage'])->name('create#page');
Route::post('create',[CategoryController::class,'create'])->name('create#pizza');
Route::get('update/{id}',[CategoryController::class,'update'])->name('update#page');
Route::post('edit/{id}',[CategoryController::class,'edit'])->name('edit#category');
Route::get('cancle/{id}',[OrderController::class,'cancle'])->name('cancle#order');
Route::post('deliver/{id}',[OrderController::class,'deliver'])->name('deliver#order');


