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
	
	/* Animals routes */
	Route::prefix('animals')->name('animals.')->namespace('Animals')->group(function () {
		
		/* Birds routes */
		Route::prefix('birds')->group(function () {
		
			/** @route admin/animals/birds
			 * 	@method GET
			 *	@desc Route to manage records regarding birds
			 */
			Route::get('/', 'BirdsController@index')->name('birds');
			
			/** @route admin/animals/birds/{formType}:[new,edit]
			 * 	@method GET
			 *	@desc Route to access the form for creating/editing a bird
			 */
			Route::get('/{formType}', 'BirdsController@showAnimalForm')->name('birds.new');
		});
		
		/* Fishes routes */
		Route::prefix('fishes')->group(function () {
			
			/** @route admin/animals/fishes
			 * 	@method GET
			 *	@desc Route to manage records regarding fishes
			 */
			Route::get('/', 'FishesController@index')->name('fishes');
		});
		
		/* Mammals routes */
		Route::prefix('mammals')->group(function () {
			
			/** @route admin/animals/mammals
			 * 	@method GET
			 *	@desc Route to manage records regarding mammals
			 */
			Route::get('/', 'MammalsController@index')->name('mammals');
		});
		
		/* Reptiles routes */
		Route::prefix('reptiles')->group(function () {
			
			/** @route admin/animals/reptiles
			 * 	@method GET
			 *	@desc Route to manage records regarding reptiles
			 */
			Route::get('/', 'ReptilesController@index')->name('reptiles');
		});
	});
	
	/* Accounts section Routes */
	Route::prefix('accounts')->name('accounts.')->namespace('Accounts')->group(function () {
		
		/* Sponsors sub-section routes */
		Route::prefix('sponsors')->group(function () {
			
			/** @route admin/accounts/sponsors
			 * 	@method GET
			 *	@desc Route to manage sponsors accounts
			 */
			Route::get('/', 'SponsorsController@index')->name('sponsors');
		});
		
		/* Users sub-section routes */
		Route::prefix('users')->group(function () {
			
			/** @route admin/accounts/users
			 * 	@method GET
			 *	@desc Route to manage users accounts
			 */
			Route::get('/', 'UsersController@index')->name('users');
		});
	});
	
	/* Events And News section routes */
	Route::prefix('eventsAndNews')->namespace('EventsAndNews')->group(function () {
		
		/** @route admin/eventsAndNews
		 * 	@method GET
		 *	@desc Route to manage events and news records
		 */
		Route::get('/', 'EventsAndNewsController@index')->name('eventsAndNews');
	});
	
	/* Locations section routes */
	Route::prefix('locations')->name('locations.')->namespace('Locations')->group(function () {
		
		/** @route admin/locations/aviary
		 * 	@method GET
		 *	@desc Route to manage aviary type locations
		 */
		Route::get('/aviary', 'AviaryController@index')->name('aviary');
		
		/** @route admin/locations/aquarium
		 * 	@method GET
		 *	@desc Route to manage aquarium type locations
		 */
		Route::get('/aquarium', 'AquariumController@index')->name('aquarium');
		
		/** @route admin/locations/compounds
		 * 	@method GET
		 *	@desc Route to manage compound type locations
		 */
		Route::get('/compounds', 'CompoundsController@index')->name('compounds');
		
		/** @route admin/locations/compounds
		 * 	@method GET
		 *	@desc Route to manage hothouse type locations
		 */
		Route::get('/hothouse', 'HothouseController@index')->name('hothouse');
	});
	
	/* Reviews section routes */
	Route::prefix('reviews')->namespace('Reviews')->group(function () {
		
		/** @route admin/reviews
		 * 	@method GET
		 *	@desc Route to manage review records
		 */
		Route::get('/', 'ReviewsController@index')->name('reviews');
	});
	
	/* Sponsor section routes */
	Route::prefix('sponsors')->name('sponsors.')->namespace('Sponsors')->group(function () {
		
		/** @route admin/sponsors/agreements
		 * 	@method GET
		 *	@desc Route to view and manage all the sponsors agreements
		 */
		Route::get('/agreements', 'AgreementsController@index')->name('agreements');
		
		/** @route admin/sponsors/signage
		 * 	@method GET
		 *	@desc Route to view and manage all the sponsors signage
		 */
		Route::get('/signage', 'SignageController@index')->name('signage');
	});
	
	/*Other Admin Routes*/
	
	/** @route admin
	 * 	@method GET
	 *	@desc Route to records management system landing page
	 */
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
