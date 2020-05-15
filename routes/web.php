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

	Auth::routes();

	Route::prefix('user')->group(function () {
		
		// @route user/auth
		// @method GET
		// @access public
		// @desc Route to display the users account management login form
		Route::get('/auth', 'Auth\UserLoginController@showLoginForm')->name('user.auth.show');
		
		// @route user/auth
		// @method POST
		// @access public
		// @desc Route to login users to account management section
		Route::post('/auth', 'Auth\UserLoginController@login')->name('user.auth.submit');
		
		// @route user/
		// @method GET
		// @access private
		// @desc Route to display users account management dashboard after authentication
		Route::get('/', 'UserController@index')->name('user.dashboard');
	});
	
	Route::prefix('sponsor')->group(function () {
		
		// @route sponsor/auth
		// @method GET
		// @access public
		// @desc Route to display the sponsors account management login form
		Route::get('/auth', 'Auth\SponsorLoginController@showLoginForm')->name('sponsor.auth.show');
		
		// @route sponsor/auth
		// @method POST
		// @access public
		// @desc Route to login sponsors to account management section
		Route::post('/auth', 'Auth\SponsorLoginController@login')->name('sponsor.auth.submit');
		
		// @route sponsor/
		// @method GET
		// @access private
		// @desc Route to show the account management dashboard for sponsors, after authentication
		Route::get('/', 'SponsorController@index')->name('sponsor.dashboard');
	});
	
	Route::prefix('admin')->group(function () {
		// @route admin/login
		// @method GET
		// @access public
		// @desc Route to show the records management backend login form
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.show');
		
		// @route admin/login
		// @method POST
		// @access public
		// @desc Route to login to the records management backend
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		
		// @route admin/
		// @method GET
		// @access private
		// @desc Route to display dashboard after user has been authenticated
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
	});
	
	Route::get('/', 'HomeController@index')->name('home');