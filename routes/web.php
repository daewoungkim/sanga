<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\AntController;

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

Route::get('/', [GoodsController::class, 'index']);
Route::get('/add', [GoodsController::class, 'addItem']);
Route::get('/about/{id}', [GoodsController::class, 'detail']);

Route::get('/prod/list', [GoodsController::class, 'list'])->name('admin.goods');

Route::get('/contact', [GoodsController::class, 'contact']);
Route::post('/contact/upload', [GoodsController::class, 'upload']);

Route::prefix('zay')->group(function () {
    Route::get('/test', function () {
        return view('ant.main');
    });

    Route::get('/', function () {
        return view('main');
    });

    Route::get('/shop-single', function () {
        return view('shop-single');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/shop', function () {
        return view('shop');
    });

    Route::get('/contact', function () {
        return view('contact');
    });
});


Route::get('/ant', function () {
    return view('ant.main');
});
