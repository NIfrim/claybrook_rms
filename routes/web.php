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

//	Auth::routes();
	
	/* ----------------------- Sponsor Routes START -------------------------------- */
	
	Route::prefix('/sponsor')->name('sponsor.')->namespace('Sponsor')->group(function(){
		
		/**
		 * Sponsor Auth Route(s)
		 */
		Route::namespace('Auth')->group(function(){
			
			//Login Routes
			Route::get('/auth','AuthController@showLoginForm')->name('login');
			Route::post('/auth','AuthController@login');
			Route::post('/logout','AuthController@logout')->name('logout');
			
			//Register Routes
			// Route::get('/register','RegisterController@showRegistrationForm')->name('register');
			// Route::post('/register','RegisterController@register');
			
			//Forgot Password Routes
			Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
			Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
			
			//Reset Password Routes
			Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
			Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
			
			// Email Verification Route(s)
			Route::get('email/verify','VerificationController@show')->name('verification.notice');
			Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
			Route::get('email/resend','VerificationController@resend')->name('verification.resend');
			
		});
		
		Route::get('/dashboard','HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');
		
		//Put all of your admin routes here...
		
	});
	
	/* ----------------------- Admin Routes END -------------------------------- */

	Route::prefix('user')->group(function () {
		
		// @route user/auth
		// @method GET
		// @access public
		// @desc Route to display the users account management login form
		Route::get('/auth', 'Auth\UserAuthController@showLoginForm')->name('user.auth.show');
		
		// @route user/auth/login
		// @method POST
		// @access public
		// @desc Route to login users to account management section
		Route::post('/auth/login', 'Auth\UserAuthController@login')->name('user.auth.login');
		
		// @route user/auth/register
		// @method POST
		// @access public
		// @desc Route to register user
		Route::post('/auth/register', 'Auth\UserAuthController@register')->name('user.auth.register');
		
		// @route user/
		// @method GET
		// @access private
		// @desc Route to display users account management dashboard after authentication
		Route::get('/', 'UserController@index')->name('user.index');
	});
	
	Route::prefix('sponsor')->name('sponsor.')->namespace('Sponsor')->group(function () {
		
		// @route sponsor/auth
		// @method GET
		// @access public
		// @desc Route to display the sponsors account management login form
		Route::get('/auth', 'Auth\SponsorLoginController@showLoginForm')->name('sponsor.auth.show');
		
		// @route sponsor/auth
		// @method POST
		// @access public
		// @desc Route to login sponsors to account management section
		Route::post('/auth/login', 'Auth\SponsorLoginController@login')->name('sponsor.auth.login');
		
		// @route sponsor/auth
		// @method POST
		// @access public
		// @desc Route to register a new sponsor account
		Route::post('/auth/register', 'Auth\SponsorLoginController@login')->name('sponsor.auth.register');
		
		// @route sponsor/
		// @method GET
		// @access private
		// @desc Route to show the account management dashboard for sponsors, after authentication
		Route::get('/', 'SponsorController@index')->name('sponsor.index');
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
		Route::get('/', 'AdminController@index')->name('admin.index');
	});
	
	Route::get('/', 'HomeController@index')->name('home');