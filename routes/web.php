<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::get('/addProduct', function () {
    return view('addProduct',['categoryID'=>App\Models\Category::all()]);
});
Route::post('/addCategory/store',[App\Http\Controllers\CategoryController::class, 'add'])
->name('addCategory');

Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class, 'add'])
->name('addProduct');
Route::post('/products',[App\Http\Controllers\ProductController::class, 'searchProduct'] ) ->name('search.products');

Route::get('/phone',[App\Http\Controllers\ProductController::class, 'phone'] ) ->name('phone');



Route::get('/viewCategory',[App\Http\Controllers\CategoryController::class, 'view'])
->name('viewCategory');

Route::get('/viewProduct',[App\Http\Controllers\ProductController::class, 'view'])
->name('viewProduct');

Route::get('/myCart',[App\Http\Controllers\cartController::class, 'view'])
->name('myCart');

Route::get('/myOrder',[App\Http\Controllers\orderController::class, 'view'])
->name('myOrder');

Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class, 'edit'])
->name('editProduct');

Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class, 'delete'])
->name('deleteProduct');

Route::post('\checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('/pdfReport',[App\Http\Controllers\orderController::class, 'pdfReport'])
->name('pdfReport');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/updateProduct',[App\Http\Controllers\ProductController::class, 'update'])
->name('updateProduct');

Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class,'productdetail'])->name('productdetail');

Route::get('/allProduct',[App\Http\Controllers\ProductController::class, 'allProduct'])
->name('allProduct');
 
Route::post('addCart',[App\Http\Controllers\cartController::class,'add'])->name('add.to.cart');