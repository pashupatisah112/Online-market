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

Route::get('/', 'UserController@index')->name('index');
Route::get('/contacts', 'UserController@contact')->name('contact.page');
Route::get('/FAQ', 'UserController@faq')->name('faq.page');
Route::get('/terms', 'UserController@terms')->name('terms.page');
Route::get('/privacy-policy', 'UserController@policy')->name('policy.page');
Route::get('/refund-policy', 'UserController@refund')->name('refund.page');
Route::get('/developer-info', 'UserController@developer')->name('developer.page');
Route::get('/quick-elecronics', 'UserController@quickElectronics')->name('quick.electronics');
Route::get('/quick-car-rental', 'UserController@quickCarRental')->name('quick.car.rental');
Route::get('/advance','UserController@advance')->name('advance');
Route::post('/advance-search','UserController@advSearch')->name('advance.search');
Route::get('/quick-student-room', 'UserController@quickStudentRoom')->name('quick.student.rooms');
Route::POST('/send','UserController@send')->name('mail.send');
Route::get('/advertise/online/{id}','AdminController@online')->name('advertise.advertise-online');
Route::get('/advertise/offline{id}','AdminController@offline')->name('advertise.advertise-offline');
Route::get('/product/sale','HomeController@createSale')->name('sale.create');
Route::POST('/product/sale','HomeController@sale')->name('sale');

Route::post('/searchresults','UserController@search')->name('search');

Route::POST('/sell', 'HomeController@sell')->name('product.sell');
Route::get('/user-login', 'UserController@login')->name('userLogin');
Route::get('/spaces/list/{id}','UserController@spaceList')->name('space-list');//id pass nagarne route lai mathi rakha
Route::get('/vehicle/List/{id}','UserController@vehicleList')->name('vehicle-list');
Route::get('/home', 'HomeController@home')->name('home');

Route::PATCH('/room-off/{id}','HomeController@roomStatusOff')->name('off');
Route::PATCH('/room-on/{id}','HomeController@roomStatusOn')->name('on');
Route::get('/create-ads','HomeController@createAd')->name('ads.create');
Route::POST('/filter-products','UserController@filter')->name('product.filter');
Route::POST('/filter-space','UserController@spaceFilter')->name('space.filter');
Route::POST('/filter-vehicle','UserController@vehicleFilter')->name('vehicle.filter');
Route::get('/product-list/{id}','UserController@category')->name('product-list');
Route::get('/product-list-city/{id}','UserController@cityProducts')->name('product-list-city');

Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('product/delete/{delete}', 'HomeController@delete')->name('product.delete');
Route::get('room/delete/{delete}', 'HomeController@deleteRoom')->name('room.delete');
Route::get('vehicle/delete/{delete}', 'HomeController@deleteVehicle')->name('vehicle.delete');
Route::PATCH('/status-off/{id}','HomeController@statusOff')->name('statusOff');
Route::PATCH('/status-on/{id}','HomeController@statusOn')->name('statusOn');

Auth::routes(['verify'=>true]);

Route::resource('user/user-profile','User\ProfileController');
Route::resource('user/user-product','User\ProductController');
Route::resource('user/user-room','User\RoomController');
Route::resource('user/user-vehicle','User\VehicleController');

Route::resource('admin/room','Admin\RoomController');
Route::resource('admin/advertisement','Admin\AdvertisementController');
Route::get('/advertise','HomeController@advertise')->name('user.advertise');
Route::resource('admin/category','Admin\CategoryController');
Route::resource('admin/city','Admin\CityController');
Route::resource('admin/product','Admin\ProductController');
Route::resource('admin/user','Admin\UserController');
Route::resource('admin/vehicle','Admin\VehicleController');
Route::resource('admin/street','Admin\StreetController');
Route::get('admin/search-record','Admin\SearchRequestController@index')->name('searchRequest.index');
Route::get('admin/search-record/destroy/{id}','Admin\SearchRequestController@destroy')->name('search.destroy');

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::POST('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin-home', 'AdminController@index')->name('admin.dashboard'); //keep this below login routes

Route::get('/locale/{locale}', function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
