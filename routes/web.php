<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductByCategoryController;
use App\Http\Controllers\ManufactureByCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ContactController;




Route::get('/',[HomeController::class,'home']);
Route::get('/product_by_category/{category_id}',[ProductByCategoryController::class,'productByCategory']);
Route::get('/manufacture_by_category/{manufacture_id}',[ProductByCategoryController::class,'manufactureByCategory']);

Route::get('/admin',[AdminController::class,'login']);

Route::get('/dashboard',[AdminController::class,'dashboard']);

Route::post('/admin-dashboard',[AdminController::class,'authenticate']);
Route::get('/logout',[AdminController::class,'logout']);
Route::get('/logout-admin',[AdminController::class,'logoutAdmin']);

//Category Routes
Route::get('/addCategory',[CategoryController::class,'index']);
Route::get('/allCategory',[CategoryController::class,'allCategory']);
Route::post('/add-category',[CategoryController::class,'addCategory']);
Route::get('/unactive/{category_id}',[CategoryController::class,'unactive']);

Route::get('/active/{category_id}',[CategoryController::class,'active']);
Route::get('/edit-category/{category_id}',[CategoryController::class,'editView']);
Route::post('/update-category/{category_id}',[CategoryController::class,'edit']);
Route::get('/delete-category/{category_id}',[CategoryController::class,'delete']);



//manufacturing routes
Route::get('/manufacture',[ManufactureController::class,'index']);
Route::post('/add-manufacture',[ManufactureController::class,'addManufacture']);
Route::get('/allManufacture',[ManufactureController::class,'allManufacture']);

Route::get('/unactiveM/{manufacture_id}',[ManufactureController::class,'unactive']);
Route::get('/activeM/{manufacture_id}',[ManufactureController::class,'active']);
Route::get('/manufacture-view/{manufacture_id}',[ManufactureController::class,'viewEdit']);
Route::post('/updateManufacture/{manufacture_id}',[ManufactureController::class,'editManufacture']);
Route::get('/deleteManufacture/{manufacture_id}',[ManufactureController::class,'delete']);


//Product routes
Route::get('/addProduct',[ProductController::class,'index']);
Route::post('/add-product',[ProductController::class,'addProduct']);
Route::get('/allProduct',[ProductController::class,'allProduct']);
Route::get('/unactiveP/{product_id}',[ProductController::class,'unactive']);
Route::get('/activeP/{product_id}',[ProductController::class,'active']);
Route::get('/deleteProduct/{product_id}',[ProductController::class,'delete']);
Route::get('/view-product/{product_id}',[ProductController::class,'viewProduct']);

//Slider Route
Route::get('/addSlider',[SliderController::class,'index']);
Route::post('/add-slider',[SliderController::class,'addSlider']);
Route::get('/allSlider',[SliderController::class,'allSlider']);
Route::get('/unactiveS/{slider_id}',[SliderController::class,'unactive']);
Route::get('/activeS/{slider_id}',[SliderController::class,'active']);
Route::get('/delete-slider/{slider_id}',[SliderController::class,'delete']);

//cart route
Route::post('/add-cart',[CartController::class,'addCart']);
Route::get('/cart',[CartController::class,'Cart']);
Route::get('/delete-cart/{rowId}',[CartController::class,'deleteCart']);
Route::post('/update-quantity',[CartController::class,'updateQuantity']);

//checkout route
Route::get('/login-check',[checkoutController::class,'loginCheck']);
Route::post('/customer-register',[checkoutController::class,'register']);
Route::get('/checkout',[checkoutController::class,'checkout']);
Route::post('/add-shipping',[checkoutController::class,'addShipping']);
Route::post('/customer-login',[checkoutController::class,'login']);
Route::get('/logout',[checkoutController::class,'logout']);
Route::get('/payment',[checkoutController::class,'payment']);
Route::post('/place-order',[checkoutController::class,'order']);
Route::get('/feedback',[checkoutController::class,'feedback']);
Route::get('/manage-order',[checkoutController::class,'manageOrder']);
Route::get('/delete-order/{order_id}',[checkoutController::class,'delete']);
Route::get('/view-order/{order_id}',[checkoutController::class,'viewOrder']);


//contact route
Route::get('/addContact',[ContactController::class,'contact']);
Route::post('/add-contact',[ContactController::class,'addContact']);
Route::get('/allContact',[ContactController::class,'allContact']);
Route::get('/contact-view/{contact_id}',[ContactController::class,'viewContact']);
Route::post('/update-contact/{contact_id}',[ContactController::class,'updateContact']);
Route::get('/deletecontact/{contact_id}',[ContactController::class,'deleteContact']);













