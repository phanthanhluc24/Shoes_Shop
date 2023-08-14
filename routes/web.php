<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/register',[AuthenticationController::class,"register"])->name("register");
Route::get('/login',[AuthenticationController::class,"login"])->name("login");
Route::post('/storeuser',[AuthenticationController::class,"store"])->name('storeuser');
// Route::get('/admin',[AuthenticationController::class,"admin"])->name('admin');
// Route::get('/user',[AuthenticationController::class,"user"])->name('user');
Route::post('/check', [HomeController::class, "checkUser"])->name('check');
// Route::get('/', [HomeController::class, "Layout"])->name('/');
// Route::get('/user', [HomeController::class, "index"])->name('user');
// Route::get('/addProduct', [HomeController::class, "addProduct"])->name('addProduct');

// Route::get('/showProduct', [ProductController::class, "index"])->name('showProduct');
// Route::get('/edit/{id}', [ProductController::class, "edit"])->name('edit');
// Route::post('/update/{id}', [ProductController::class, "update"])->name('update');

// Route::get('/producthome', [ProductController::class, "producHome"])->name('producthome');
// Route::post('/user_shopping', [ShoppingController::class, "store"])->name('cart-shopping');
// Route::get('/order', [ShoppingController::class, "index"])->name('order');

// Giày dép
Route::get("/",[ProductController::class,"index"])->name("index");
Route::get("/Adminadd",[ProductController::class,"addProduct"])->name("Adminadd");
Route::post('/store', [ProductController::class, "store"])->name('store');
Route::get("/Adminshow",[AdminController::class,"index"])->name("Adminshow");
Route::get('/edit/{id}', [AdminController::class, "edit"])->name('edit');
Route::put('/update/{id}', [AdminController::class, "update"])->name('update');
Route::delete('/destroy/{id}', [ProductController::class, "destroy"])->name('delete');
Route::get('/add-to-card/{id}', [ProductController::class, "addToCard"])->name('add-to-card');
Route::get('/user-shopping', [ShoppingController::class, "index"])->name('user-shopping');
Route::get('/truncate', [ShoppingController::class, "destroy"])->name('truncate');
Route::post('/payment', [AuthenticationController::class, "payment"])->name('payment');
Route::get("/logout",[HomeController::class, "logout"])->name("logout");
Route::delete('/delete/{id}',[ShoppingController::class,"delete"])->name("userDelete");

Route::post("/research",[ResearchController::class, "index"]);

Route::get("/detail/{id}",[ProductController::class, "detail"])->name('detail');
Route::post("/detail-page",[ShoppingController::class, "storeDetal"])->name('detail-page');
Route::put("/increment/{id}",[ProductController::class, "Increment"])->name('increment');
Route::put("/decrement/{id}",[ProductController::class, "Decrement"])->name('decrement');