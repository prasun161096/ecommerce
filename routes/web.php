<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
/*

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
// Route::get('/admin', function() {
//     return view('admin.dasheboard');

// });
// Route::get('/login', function() {
//     return view('admin.login');
// });


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin' ], function(){
    Route::get('/', function () {
        return redirect('/admin/dasheboard');
        });
  
    Route::get('/login', [AdminController::class,'login']);
    Route::post('/login',[AdminController::class,'adminlogin']);

    Route::group(['middleware' => ['adminlogin','revalidate']], function(){

        Route::get('/dasheboard', [AdminController::class,'dasheboard']); 
        Route::get('/logout',[AdminController::class,'logout']);
        //Product
        Route::get('/add-product',[ProductController::class,'add_product']);
        Route::post('/add-product',[ProductController::class,'store_poroduct']);
        Route::get('/list-product',[ProductController::class,'list_product']);
        Route::get('/edit-product/{id}',[ProductController::class,'edit_product']);
        Route::post('/edit-product/{id}',[ProductController::class,'update_product']);
        Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);
        
        //Brand
        Route::get('/add-brand',[BrandController::class,'add_brand']);
        Route::post('/add-brand',[BrandController::class,'store_brand']);
        Route::get('/brand-list',[BrandController::class,'brand_list']);
        Route::get('/edit-brand/{id}',[BrandController::class,'edit_brand']);
        Route::post('/edit-brand/{id}',[BrandController::class,'update_brand']);

        //Category
        Route::get('/add-category',[CategoryController::class,'showCategory']);
        Route::post('/add-category',[CategoryController::class,'storeCategory']);
        Route::get('/category-list',[CategoryController::class,'categoryList']);
        Route::get('/edit-category/{id}',[CategoryController::class,'edit_category']);
        Route::post('/edit-category/{id}',[CategoryController::class,'update_category']);



      
    });  
  
});
