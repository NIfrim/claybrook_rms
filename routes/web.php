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


//Auth::routes();

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::prefix('user')->name('user.')->namespace('User')->group(function () {
		
		/*Auth Routes*/
		Route::namespace('Auth')->group(function () {
				
				/** @route user/login
				 * 	@method GET
				 *	@desc Route to access the login form
				 */
				Route::get('/auth', 'LoginController@showLoginForm')->name('auth.show');
				
				/** @route user/login
				 * 	@method POST
				 *	@desc Route to submit credentials for validation and get access to account management
				 */
				Route::post('/login', 'LoginController@login')->name('login');
				
				/** @route user/register
				 * 	@method POST
				 *	@desc Route to register a new account
				 */
				Route::post('/register', 'RegisterController@register')->name('register');
				
				/** @route logout
				 * 	@method POST
				 *	@desc Route to request logout from account management
				 */
				Route::post('/logout', 'LoginController@logout')->name('logout');
				
		});
		
		/*Other User Routes*/
		Route::get('/', 'HomeController@index')->name('home');
});

/*-------------------------- User Routes END --------------------------*/


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
	
	/*Auth Routes*/
	Route::namespace('Auth')->group(function () {
		
		/** @route admin/login
		 * 	@method GET
		 *	@desc Route to access the login form
		 */
		Route::get('/login', 'LoginController@showLoginForm')->name('login');
		
		/** @route user/login
		 * 	@method POST
		 *	@desc Route to submit credentials for validation and get access to account management
		 */
		Route::post('/login', 'LoginController@login')->name('login');
		
		/** @route user/register
		 * 	@method POST
		 *	@desc Route to register a new account
		 */
		Route::post('/register', 'RegisterController@register')->name('register');
		
		/** @route logout
		 * 	@method POST
		 *	@desc Route to request logout from account management
		 */
		Route::post('/logout', 'LoginController@logout')->name('logout');
		
	});
	
	/*Other Admin Routes*/
	Route::get('/', 'HomeController@index')->name('home');
});

/*-------------------------- Admin Routes END --------------------------*/


/*
|--------------------------------------------------------------------------
| Sponsor Routes
|--------------------------------------------------------------------------
*/

Route::prefix('sponsor')->name('sponsor.')->namespace('Sponsor')->group(function () {
		
		/*Auth Routes*/
		Route::namespace('Auth')->group(function () {
				
				/** @route sponsor/auth
				 * 	@method GET
				 *	@desc Route to access the authentication forms (login/register)
				 */
				Route::get('/auth', 'LoginController@showLoginForm')->name('auth.show');
				
				/** @route sponsor/login
				 * 	@method POST
				 *	@desc Route to submit credentials for validation and get access to account management
				 */
				Route::post('/login', 'LoginController@login')->name('login');
				
				/** @route sponsor/register
				 * 	@method POST
				 *	@desc Route to register a new account
				 */
				Route::post('/register', 'RegisterController@register')->name('register');
				
				/** @route sponsor/logout
				 * 	@method POST
				 *	@desc Route to request logout from account management
				 */
				Route::post('/logout', 'LoginController@logout')->name('logout');
				
		});
		
		/*Other sponsor Routes*/
		Route::get('/', 'HomeController@index')->name('home');
});

/*-------------------------- Sponsor Routes END --------------------------*/


Route::get('/', function () {
		return view('welcome');
})->name('welcome');
