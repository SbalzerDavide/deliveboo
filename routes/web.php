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

Route::get('/', 'HomeController@index')->name('homepage');
/* Route::get('/send-mail', function(){
    $details = [
        'title' => 'mail from deliveBoo',
        'body' => 'you are the best'
    ];
    Mail::to('galanti_francesco@yahoo.it')->send(new \App\Mail\EmailCheck($details));

    echo 'Email has been sent';
}); */

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::get('/orders','OrderController@index')->name('orders');
        Route::get('/chart','ChartController@index')->name('chart');
        Route::resource('restaurants', 'RestaurantController');
    });

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restaurant/{name}', 'RestaurantController@filter')->name('RestaurantByGenre');
Route::get('/restaurant', 'RestaurantController@index')->name('Restaurant');
/* Route::prefix('guest')
    ->namespace('Guest')
    ->name('guest.')
    ->group(function(){
        Route::get('/', 'RestaurantController@index')->name('restaurant');
    }); */
    
/* Route::get('/restaurantShow/{name}', 'ShowRestaurantController@show')->name('RestaurantShow'); */

Route::prefix('guest')
    ->namespace('Guest')
    ->name('guest.')
    ->group(function(){
        Route::get('/restaurantShow/{slug}', 'ShowRestaurantController@show')->name('RestaurantShow');

        Route::get('/cart/{slug}', 'CartController@index')->name('cart.index');
        Route::get('/add-to-cart/{dish}', 'CartController@add')->name('cart.add');
        Route::get('/remove/{id}', 'CartController@remove')->name('remove');
        Route::get('/more/{id}', 'CartController@more')->name('more');
        Route::get('/less/{id}', 'CartController@less')->name('less');
        Route::post('/store', 'CartController@store')->name('store');
        Route::get('/pay/{id}', 'CartController@pay')->name('pay');
        Route::post('/payment/{id}', 'CartController@payment')->name('payment');
        Route::patch('/update/{id}', 'CartController@update')->name('update');

    }); 