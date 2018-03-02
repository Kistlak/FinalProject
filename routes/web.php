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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
Route::get('/AdminPanel', 'AdminPanelController@index')->name('AdminPanel');
Route::get('/MoviePosters', 'MoviePostersController@index')->name('MoviePosters');

});

Route::get('/index', 'indexController@index')->name('index');

// Login
Route::post('loginprocess',[
'uses'=> 'MyLoginController@loginprocess',
'as' => 'loginprocess'
]);
Route::get('/logout', 'MyLoginController@logout')->name('logout');
Route::get('auth/google', 'Auth\SMController@redirectToProvider')->name('SMLoginGoogle');
Route::get('auth/google/callback', 'Auth\SMController@handleProviderCallback');
Route::get('auth/facebook', 'Auth\SMController@redirectToProviderFB')->name('SMLoginFB');
Route::get('auth/facebook/callback', 'Auth\SMController@handleProviderCallbackFB');

// AdminPanel
Route::post('adinsert',[
'uses'=> 'AdminPanelController@adinsert',
'as' => 'adinsert'
]);
Route::get('/edit/{id}', 'AdminPanelController@edit');
Route::put('/adminedit/{id}', 'AdminPanelController@adminedit');
Route::get('delete{id}','AdminPanelController@DeleteUser');

// MoviePosters
Route::post('posterinsert',[
'uses'=> 'MoviePostersController@posterinsert',
'as' => 'posterinsert'
]);
Route::get('/postershowedit/{id}', 'MoviePostersController@postershowedit');
Route::put('/posteredit/{id}', 'MoviePostersController@posteredit');
Route::get('posterdelete{id}','MoviePostersController@DeletePoster');

// CustomizeWeb
Route::post('logoupdate',[
'uses'=> 'CustomizeWebController@logoupdate',
'as' => 'logoupdate'
]);
Route::get('/Logo', 'CustomizeWebController@logoshow')->name('Logo');
Route::get('/CustomizeWeb', 'CustomizeWebController@index')->name('CustomizeWeb');

// Seats
Route::get('/Seats', 'SeatsController@index')->name('Seats');