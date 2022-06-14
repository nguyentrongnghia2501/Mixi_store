<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\slide\SildeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainUsController;
use App\Models\oder;
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

Route::get('/admin/users/login/', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store/', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');

        //  Menus áda
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::DELETE('delete', [MenuController::class, 'delete']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
        });
        ///products

        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('delete/{id}', [ProductController::class, 'destroy']);
            Route::get('edit/{id}', [ProductController::class, 'show']);
            Route::post('edit/{id}', [ProductController::class, 'update']);
        });
        Route::prefix(('slider'))->group(function () {

            Route::get('add', [SildeController::class, 'create']);
            Route::post('add', [SildeController::class, 'store']);
            Route::get('list', [SildeController::class, 'index']);
            Route::get('delete/{id}', [SildeController::class, 'destroy']);
            Route::get('edit/{id}', [SildeController::class, 'show']);
            Route::post('edit/{id}', [SildeController::class, 'update']);
        });
    });
});
Route::get('/',[MainUsController::class,'index']);
Route::get('',[MainUsController::class,'index']);
Route::get('/single-product/{id}',[MainUsController::class,'single']);
route::get('/shoppage/',[MainUsController::class,'shoppage']);
//  giỏ hàng
Route::post('/add-cart',[CartController::class,'SaveCart']);
Route::get('ShopPingCart',[CartController::class,'show']);
Route::post('checkout',[CartController::class,'checkout']);
Route::get('Shop_list',[MainUsController::class,'shopage']);
Route::post('/search_product',[MainUsController::class,'search']);
Route::get('danh-muc/{id}',[MainUsController::class,'danhmuc']);
