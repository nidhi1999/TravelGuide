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

//Route::get('/', function () {
    //return view('layout');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'SessionController@logout');
Route::get('/tourist/register','TouristsController@create');
Route::post('/tourist/store', 'TouristsController@store');
Route::get('/guide/register', 'GuideController@create');
Route::post('/guide/store', 'GuideController@store');
Route::get('/guide','GuideController@index');
Route::get('/tourist','TouristsController@index');
Route::get('/search','TouristsController@searchGuide');
Route::post('/selectGuide','TouristsController@selectGuide');
//Route::get('/guide/sendMail/{id}', 'GuideController@sendMail');
Route::post('/guide/book/{id}/{id1}','TouristsController@bookGuide')->name('bookGuide');
Route::post('booking/store','TouristsController@booking');
Route::get('/UpcomingTrips','GuideController@upcomingTrips');
Route::get('/PastTrips','GuideController@pastTrips');
Route::get('/destination/{loc}','DestinationsController@search');
Route::post('/destination/{path}','DestinationsController@show');
Route::get('/destination/describe/{id}','DestinationsController@describe');
Route::get('/guide/destination/suggest','DestinationsController@suggest');
Route::post('/guide/destination/store','DestinationsController@store');
Route::post('/guide/destination/view', 'DestinationsController@view');
Route::get('/guide/view/{id}/{addr}', 'TouristsController@view')->name('viewGuide');
Route::get('/cal','CalendarController@index');
Route::post('/guide/view/{id}/availability', 'TouristsController@checkAvailability')->name('availability');
Route::post('/guide/book/check','TouristsController@check')->name('check');
Route::post('/UpcomingTrips/update','GuideController@update')->name('update');
Route::get('/experience/share','TouristsController@share');
Route::post('/experience/store','TouristsController@storeExp')->name('storeExp');

Route::get('/rate/guide','RatingsController@view');
Route::post('/rate/store','RatingsController@store');
Route::post('/review/create','ReviewsController@view');
Route::post('/review/store','ReviewsController@store')->name('guideReview');
Route::get('admin/login', 'AdminLoginController@getAdminLogin');
Route::post('admin/login', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
Route::get('/admin','AdminController@index')->name('admin.dashboard');
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
});
Route::get('/destination/add','DestinationsController@suggest1');
Route::post('/destination/add','DestinationsController@add');
Route::get('/remove/guide','AdminController@removeGuide');
Route::get('/remove/tourist','AdminController@removeTourist');
Route::post('/status/updateGuide','StatusController@updateGuide');
Route::post('/status/updateTourist','StatusController@updateTourist');
Route::get('/view/suggestions','AdminController@suggestions');
Route::post('/status/updateDestination','StatusController@verifySuggestions');
Route::get('/view/destination/{id}','DestinationsController@view1')->name('viewDestination');
Route::get('/view/destination/all/{address}/{category}','DestinationsController@viewAll')->name('viewAll');
Route::get('view/trip/{id}', 'TouristsController@viewtrip')->name('viewTrip');
