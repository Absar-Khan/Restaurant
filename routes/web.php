<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
Route::post('/add/cart/{id}',[UserController::class,'AddCart'])->name('add.cart');
Route::post('/order/confirm',[UserController::class,'OrderConfirm'])->name('order.confirm');
Route::post('/add/feedback',[UserController::class,'AddFeedback'])->name('add.feedback');
Route::get('/delete/cart/item/{id}',[UserController::class,'DeleteCartItem'])->name('delete.cart.item');
Route::get('/show/cart/{id}',[UserController::class,'ShowCart'])->name('show.cart');
Route::post('/user/reservation',[UserController::class,'UserReservation'])->name('user.reservation');
Route::get('/',[UserController::class,'Index'])->name('home');
Route::get('/redirects',[UserController::class,'Redirects'])->name('redirects');

Route::get('/admin/user',[AdminController::class,'AdminUser'])->name('admin.user');
Route::get('/delete/user/{id}',[AdminController::class,'DeleteUser'])->name('delete.user');
Route::get('/add/food',[AdminController::class,'AddFood'])->name('add.food');
Route::post('/food/menu',[AdminController::class,'AddFoodMenu'])->name('food.menu');
Route::get('/delete/food/menu/{id}',[AdminController::class,'DeleteFoodMenu'])->name('delete.food.menu');
Route::get('/edit/food/menu/{id}',[AdminController::class,'EditFoodMenu'])->name('edit.food.menu');
Route::post('/update/food/menu/{id}',[AdminController::class,'UpdateFoodMenu'])->name('update.food.menu');
Route::get('/admin/show/userreservation',[AdminController::class,'AdminShowUserReservation'])->name('admin.show.userreservation');
Route::get('/food/chef',[AdminController::class,'FoodChef'])->name('food.chef');
Route::post('/add/food/chef',[AdminController::class,'AddFoodChef'])->name('add.food.chef');
Route::get('/delete/food/chef/{id}',[AdminController::class,'DeleteFoodChef'])->name('delete.food.chef');
Route::get('/edit/food/chef/{id}',[AdminController::class,'EditFoodChef'])->name('edit.food.chef');
Route::post('/update/food/chef/{id}',[AdminController::class,'UpdateFoodChef'])->name('update.food.chef');
Route::get('/admin/show/order',[AdminController::class,'AdminShowOrder'])->name('admin.show.order');
Route::get('/admin/delete/order/{id}',[AdminController::class,'AdminDeleteOrder'])->name('admin.delete.order');
Route::get('/search',[AdminController::class,'Search'])->name('search');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
