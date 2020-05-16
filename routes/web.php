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
				Route::get('/login', 'LoginController@showLoginForm')->name('login.show');
				
				/** @route user/login
				 * 	@method POST
				 *	@desc Route to submit credentials for validation and get access to account management
				 */
				Route::post('/login', 'LoginController@login')->name('login');
				
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
| Sponsor Routes
|--------------------------------------------------------------------------
*/

Route::prefix('sponsor')->name('sponsor.')->namespace('Sponsor')->group(function () {
		
		/*Auth Routes*/
		Route::namespace('Auth')->group(function () {
				
				/** @route user/login
				 * 	@method GET
				 *	@desc Route to access the login form
				 */
				Route::get('/login', 'LoginController@showLoginForm')->name('login.show');
				
				/** @route user/login
				 * 	@method POST
				 *	@desc Route to submit credentials for validation and get access to account management
				 */
				Route::post('/login', 'LoginController@login')->name('login');
				
				/** @route logout
				 * 	@method POST
				 *	@desc Route to request logout from account management
				 */
				Route::post('/logout', 'LoginController@logout')->name('logout');
				
		});
		
		/*Other sponsor Routes*/
		Route::get('/', 'HomeController@index')->name('home');
});

/*-------------------------- User Routes END --------------------------*/


Route::get('/', function () {
		return view('welcome');
})->name('welcome');
