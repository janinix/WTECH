<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogRegConstroller;
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
Route::controller(LogRegConstroller::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::get('register','register')->name('register');
    Route::get('logout','logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
});

Route::get('/kosik_zhrnutie', function () {
    return view('kosik_zhrnutie');
});
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
