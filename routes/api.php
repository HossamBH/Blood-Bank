<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace' => 'Api'],function(){
	Route::get('governorates','MainController@governorates');
	Route::get('cities','MainController@cities');
	Route::get('blood-types','MainController@bloodTypes');
	Route::get('settings','MainController@settings');
	Route::get('categories','MainController@categories');
	Route::post('signup','AuthController@signup');
	Route::post('login','AuthController@login');
	Route::post('reset-password','AuthController@resetPassword');
	Route::post('new-password','AuthController@newPassword');

	Route::group(['middleware' => 'auth:api'],function(){
		Route::post('posts','MainController@posts');
		Route::post('contacts','MainController@contacts');
		Route::post('profile','MainController@profile');
		Route::post('get-notification-setting','MainController@getNotificationSetting');
		Route::post('set-notification-setting','MainController@setNotificationSetting');
		Route::post('get-favourates','MainController@getFavourates');
		Route::post('set-favourates','MainController@setFavourates');
		Route::post('register-token','AuthController@registerToken');
		Route::post('remove-token','AuthController@removeToken');
		Route::post('donation-request','DonationController@donationRequestCreate');
		Route::post('search-donations','DonationController@searchDonations');
		Route::post('show-donation','DonationController@showDonation');
		Route::post('show-post','MainController@showPost');
	});
});