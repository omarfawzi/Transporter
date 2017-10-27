<?php

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

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/',function (){
    return view('adminPanel');
});

//Route::group(['prefix'=>'admin'],function () {
//    Auth::routes();
//    Route::group(['middleware'=>'auth'],function (){
//        Route::get('/', 'AdminController@index')->name('admin');
//        Route::get('placeOrderView','AdminController@placeOrderView')->name('placeOrderView');
//    });
//});

Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix'=>'api'],function (){
        Route::post('login', 'VueController@login');
        Route::post('resetPassword','VueController@resetPassword');
        Route::get('exportOrders','VueController@exportOrders');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::get('user','VueController@getUser');
            Route::post('register','VueController@register');
            Route::get('getOrders','VueController@getOrders');
            Route::get('getSpecificOrder/{orderID}','VueController@getSpecificOrder');
            Route::get('getDeliveryMen','VueController@getDeliveryMen');
            Route::post('cancelOrder/{orderID}','VueController@cancelOrder');
            Route::post('updateOrder/{orderID}','VueController@updateOrder');
            Route::post('placeOrder','VueController@placeOrder');
        });
    });
});

Route::group(['prefix'=>'mobileAPI'],function (){
   Route::post('hello','APIController@hello');
   Route::post('register','APIController@register');
   Route::post('login','APIController@login');
   Route::post('placeOrder','APIController@placeOrder');
});

Route::any('{catchall}', function ($page) {
    return redirect('/');
})->where('catchall', '(.*)');
