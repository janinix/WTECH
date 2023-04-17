<?php

use App\Http\Controllers\ShopInfoDelPayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogRegConstroller;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\CreateItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketOverviewController;

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

/*Route::get('/', function () {
    return view('home.main_page');
});*/



//route::get('/',[HomeController::class,"main_page"]);
Route::get('/', function () {
    return view('main_page');
});
Route::get('/main_page', function () {
    return view('main_page');
});

Route::controller(LogRegConstroller::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::get('register','register')->name('register');
    Route::get('admin_pouzivatelia','admin_pouzivatelia')->name('admin_pouzivatelia');
    Route::get('logout','logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('validate_registration');
    Route::post('validate_login', 'validate_login')->name('validate_login');
});

Route::delete('delete_user/{user_id}', [DeleteController::class, 'delete_user'])->name('delete_user');
Route::delete('delete_product/{product_id}', [DeleteController::class, 'delete_product'])->name('delete_product');

Route::post('create_item', [CreateItemController::class, 'create_item'])->name('create_item');

Route::post('product_vyziva', [ProductController::class, 'product_vyziva'])->name('product_vyziva');
Route::post('product_oblecenie', [ProductController::class, 'product_oblecenie'])->name('product_oblecenie');
Route::post('product_potraviny', [ProductController::class, 'product_potraviny'])->name('product_potraviny');
Route::post('product_prislusenstvo', [ProductController::class, 'product_prislusenstvo'])->name('product_prislusenstvo');
Route::post('product_vyhladavanie', [ProductController::class, 'product_vyhladavanie'])->name('product_vyhladavanie');
Route::post('product_filter_cena', [ProductController::class, 'product_filter_cena'])->name('product_filter_cena');
Route::post('/product_detail/{id}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::post('product_filter_znacka', [ProductController::class, 'product_filter_znacka'])->name('product_filter_znacka');
Route::post('price_up', [ProductController::class, 'price_up'])->name('price_up');
Route::post('price_down', [ProductController::class, 'price_down'])->name('price_down');

Route::get('/kosik_prehlad', [BasketOverviewController::class, 'index'])->name('index');

Route::get('/kosik_zhrnutie', function () {
    return view('kosik_zhrnutie');
});

Route::post('validate_info', [ShopInfoDelPayController::class, 'validate_info'])->name('validate_info');
Route::post('options', [ShopInfoDelPayController::class, 'options'])->name('options');


// add product to database -- basket
Route::post('/add_product', [BasketOverviewController::class, 'addProduct'])->name('add_product');

Route::post('/add_product_detail', [BasketOverviewController::class, 'addProductDetail'])->name('add_product_detail');
// route to update quantity from prehlad_produktov + - change in cart
Route::post('/update_quantity/{id}}', [BasketOverviewController::class, 'updateQuantity'])->name('update_quantity');
// product_delete from prehlad_produktov
Route::post('product_delete/{id}', [BasketOverviewController::class, 'productDelete'])->name('product_delete');



Route::get('/kosik_doprava_platba', function () {
    return view('kosik_doprava_platba');
});
Route::get('/kosik_prehlad', function () {
    return view('kosik_prehlad');
});
Route::get('/product_detail', function () {
    return view('product_detail');
});
Route::get('/prehlad_produktov', function () {
    return view('prehlad_produktov');
});
Route::get('/admin_produkty', function () {
    return view('admin_produkty');
});
