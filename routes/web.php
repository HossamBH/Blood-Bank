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


/***************************** DASHBOARD **********************/
Auth::routes();

Route::group(['middleware' => ['auth']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::group(['namespace' => 'Admin'],function(){	
		Route::resource('governorates', 'GovernorateController');
		Route::resource('cities', 'CityController');
		Route::resource('categories', 'CategoryController');
		Route::resource('posts', 'PostController');
		Route::resource('settings', 'SettingController');
		Route::resource('donations', 'DonationController');
		Route::get('/contacts', 'ContactController@index');
		Route::delete('/contacts/{contact}', 'ContactController@destroy');
		Route::get('/clients', 'ClientController@index');
		Route::delete('/clients/{client}', 'ClientController@destroy');
		Route::get('client/{id}/activate', 'ClientController@activate');
		Route::get('client/{id}/de-activate', 'ClientController@deActivate');
		Route::resource('donations', 'DonationController');
		Route::resource('roles', 'RoleController');
	});

	Route::resource('users', 'UserController');
	Route::get('user-password/change-password', 'UserController@changePassword');
	Route::put('user-password/change-password', 'UserController@changePasswordSave');
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

/******************************* WEBSITE *********************************/

Route::group(['namespace' => 'Web'],function(){

	Route::group(['prefix' => 'user'],function(){
		Route::get('login', 'AuthController@login')->name('user.login');
		Route::post('login', 'AuthController@signin');
		Route::get('signup', 'AuthController@signup');
		Route::post('signup', 'AuthController@signupSave');
	});

	Route::group(['middleware' => 'auth:clients'],function(){
		
		Route::get('/', 'MainController@home')->name('main');
		Route::post('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');

		Route::group(['prefix' => 'user'],function(){
			Route::get('articles', 'MainController@articles');
			Route::get('article-details/{id}', 'MainController@articleDetails');
			Route::get('how-we-are', 'MainController@howWeAre');
			Route::get('contact-us', 'MainController@setting');
			Route::post('contact-us', 'MainController@contact');
			Route::get('donation-details/{id}', 'DonationController@donationDetails');
			Route::get('donations', 'DonationController@donations');
			Route::get('donation-create', 'DonationController@donationCreate');
			Route::post('donation-create', 'DonationController@donationCreateSave');
			Route::get('change-password', 'ChangePasswordController@changePassword');
			Route::put('change-password', 'ChangePasswordController@changePasswordSave');
			Route::get('logout', 'AuthController@clientLogout');
		});
	});
});
