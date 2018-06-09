<?php

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

Route::get('/', 'indexController@index')->name('index');

// Login
Route::post('loginprocess', [
    'uses' => 'MyLoginController@loginprocess',
    'as' => 'loginprocess'
]);
Route::get('/logout', 'MyLoginController@logout')->name('logout');
Route::get('auth/google', 'Auth\SMController@redirectToProvider')->name('SMLoginGoogle');
Route::get('auth/google/callback', 'Auth\SMController@handleProviderCallback');
Route::get('auth/facebook', 'Auth\SMController@redirectToProviderFB')->name('SMLoginFB');
Route::get('auth/facebook/callback', 'Auth\SMController@handleProviderCallbackFB');

// AdminPanel
Route::get('/adminPanel', 'AdminPanelController@index')->name('AdminPanel');
Route::post('adinsert', [
    'uses' => 'AdminPanelController@adinsert',
    'as' => 'adinsert'
]);
Route::get('/edit/{edd}', 'AdminPanelController@edit');
Route::put('/adminedit/{id}', 'AdminPanelController@adminedit');
Route::get('delete{id}', 'AdminPanelController@DeleteUser');
Route::get('/approvededit/{id}', 'AdminPanelController@approvededit');
Route::get('/rejectededit/{id}', 'AdminPanelController@rejectededit');

// MoviePoster
Route::get('/MoviePosters', 'MoviePostersController@index')->name('MoviePosters');
Route::post('posterinsert', [
    'uses' => 'MoviePostersController@posterinsert',
    'as' => 'posterinsert'
]);
Route::get('/postershowedit/{id}', 'MoviePostersController@postershowedit');
Route::put('/posteredit/{id}', 'MoviePostersController@posteredit');
Route::get('posterdelete{id}', 'MoviePostersController@DeletePoster');

// CustomizeWeb
Route::post('logoupdate', [
    'uses' => 'CustomizeWebController@logoupdate',
    'as' => 'logoupdate'
]);
Route::get('/Logo', 'CustomizeWebController@logoshow')->name('Logo');
Route::get('/CustomizeWeb', 'CustomizeWebController@index')->name('CustomizeWeb');

// Seats
Route::get('/Seats', 'SeatsController@index')->name('Seats');
//Route::get('/editSeats/{edd}', 'indexController@editSeats');
Route::post('seatsinsert', [
    'uses' => 'SeatsController@seatsinsert',
    'as' => 'seatsinsert'
]);
Route::post('seatprocess', [
    'uses' => 'SeatsController@seatprocess',
    'as' => 'seatprocess'
]);

// Book
Route::get('/editBook/{bk}', 'indexController@editBooks');
Route::post('booktsinsert', [
    'uses' => 'BookSeatController@booktsinsert',
    'as' => 'booktsinsert'
]);
Route::get('/BookNo', 'BookSeatController@index')->name('BookNo');
Route::get('/BookConfirm', 'BookSeatController@bookconfirmation')->name('BookConfirm');

// Price
Route::get('/price', 'PriceController@index')->name('Price');
Route::get('/searchmovies', 'SearchMoviesController@index')->name('SearchMovies');
Route::post('msearch', [
    'uses' => 'SearchMoviesController@msearch',
    'as' => 'msearch'
]);

// New Seats
Route::get('/newseat', 'NewSeatController@index')->name('NewSeat');
//Route::post('booktsinsert', [
//    'uses' => 'NewSeatController@booktsinsert',
//    'as' => 'booktsinsert'
//]);

// -----------------------------

Route::get('/movies', 'MovieController@index')->name('movies.index');

Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

Route::post('/movies/{movie}/bookings', 'BookingController@show')->name('bookings.show');

Route::post('/bookings', 'BookingController@store')->name('bookings.store');

Route::get('/showseats', 'SeatController@index')->name('showseats');

Route::post('/send', 'EmailController@send')->name('send');

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));

Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));

Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

Route::get('/contactus', 'ContactUsController@index')->name('contactus');

Route::post('cuinsert', [
    'uses' => 'ContactUsController@cuinsert',
    'as' => 'cuinsert'
]);