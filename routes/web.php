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
		
		/** @route admin/animals/{type}{array_params}
		 * 	@method GET
		 *	@desc Route to retrieve a list of animals by specific type
		 */
		Route::get('/{type}', 'AnimalsController@list')->name('list');
		
		/** @route admin/animals/{type}/{id}
		 * 	@method GET
		 *	@desc Route to access the form for creating/editing an animal
		 */
		Route::get('/{type}/{id}', 'AnimalsController@showForm')->name('manage');
		
		/** @route admin/animals/{type}/delete {birds|fish|mammals|reptiles}
		 * 	@method POST
		 *	@desc Route to remove animal records
		 */
		Route::post('/{type}/delete', 'AnimalsController@delete')->name('delete');
		
		/** @route admin/animals/{type}/{formType} [birds|fish|mammals|reptiles]/[new|edit]
		 * 	@method POST
		 *	@desc Route to submit changes when creating or editing an animal
		 */
		Route::post('/{type}/{formType}', 'AnimalsController@submit')->name('submit');
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
	Route::prefix('eventsAndNews')->name('eventsAndNews.')->namespace('EventsAndNews')->group(function () {
		
		/** @route admin/events
		 * 	@method GET
		 *	@desc Route to list records by {type} {events|news}
		 */
		Route::get('/{type}', 'EventsAndNewsController@list')->name('list');
		
		/** @route admin/events
		 * 	@method GET
		 *	@desc Route to list records by {type} {events|news}
		 */
		Route::get('/{type}/categories', 'EventsAndNewsController@listCategories')->name('list.categories');
		
		/** @route admin/eventsAndNews/{type}/{id} {events|news}/{id|new}
		 * 	@method GET
		 *	@desc Route to access the form for creating/editing an event or a news article
		 */
		Route::get('/{type}/{id}', 'EventsAndNewsController@showForm')->name('manage');
		
		/** @route admin/events/delete
		 * 	@method POST
		 *	@desc Route to remove events records
		 */
		Route::post('/{type}/delete', 'EventsAndNewsController@delete')->name('delete');
		
		/** @route admin/eventsAndNews/{type}/{formType} {events|news}/[new|edit]
		 * 	@method POST
		 *	@desc Route to submit changes when creating or editing an event of news record
		 */
		Route::post('/{type}/{formType}', 'EventsAndNewsController@submit')->name('submit');
	});
	
	/* Locations section routes */
	Route::prefix('locations')->name('locations.')->namespace('Locations')->group(function () {
		
		/** @route admin/locations/{type}
		 * 	@method GET
		 *	@desc Route to retrieve a list of all locations by type
		 */
		Route::get('/{type}', 'LocationsController@list')->name('list');
		
		/** @route admin/locations/{type}/{id}
		 * 	@method GET
		 *	@desc Route to access the form for creating/editing a location
		 */
		Route::get('/{type}/{id}', 'LocationsController@showForm')->name('manage');
		
		/** @route admin/locations/{type}/delete {aviary|aquarium|compound|hothouse}
		 * 	@method POST
		 *	@desc Route to remove location records
		 */
		Route::post('/{type}/delete', 'LocationsController@delete')->name('delete');
		
		/** @route admin/locations/{type}/{formType} {aviary|aquarium|compound|hothouse}/[new|edit]
		 * 	@method POST
		 *	@desc Route to submit changes when creating or editing a location
		 */
		Route::post('/{type}/{formType}', 'LocationsController@submit')->name('submit');
	});
	
	/* Reviews section routes */
	Route::prefix('reviews')->name('reviews.')->namespace('Reviews')->group(function () {
		
		/** @route admin/reviews
		 * 	@method GET
		 *	@desc Route to list all the reviews based on who posted them
		 */
		Route::get('/', 'ReviewsController@list')->name('list');
		
		/** @route admin/reviews/delete
		 * 	@method POST
		 *	@desc Route to remove reviews
		 */
		Route::post('/delete', 'ReviewsController@delete')->name('delete');
	});
	
	/* Attractions section routes */
	Route::prefix('attractions')->name('attractions.')->namespace('Attractions')->group(function () {
		
		/** @route admin/attractions
		 * 	@method GET
		 *	@desc Route to list all attractions
		 */
		Route::get('/', 'AttractionsController@list')->name('list');
		
		/** @route admin/locations/{type}/{id}
		 * 	@method GET
		 *	@desc Route to access the form for creating/editing a location
		 */
		Route::get('/{id}', 'AttractionsController@showForm')->name('manage');
		
		/** @route admin/attractions/{formType} [new|edit]
		 * 	@method POST
		 *	@desc Route to submit changes when creating or editing an attraction
		 */
		Route::post('/{formType}', 'AttractionsController@submit')->name('submit');
		
		/** @route admin/attractions/delete
		 * 	@method POST
		 *	@desc Route to remove attractions
		 */
		Route::post('/{type}/delete', 'AttractionsController@delete')->name('delete');
	});
	
	/* Sponsor section routes */
	Route::prefix('sponsors')->name('sponsors.')->namespace('Sponsors')->group(function () {
		
		/** @route admin/sponsors/{type} {accounts|agreements|signage}
		 * 	@method GET
		 *	@desc Route to list specific sponsors information
		 */
		Route::get('/{type}', 'SponsorsController@list')->name('list');
		
		/** @route admin/sponsors/{type}/{id}
		 * 	@method GET
		 *	@desc Route to access the form for creating/editing
		 */
		Route::get('/{type}/{id}', 'SponsorsController@showForm')->name('manage');
		
		/** @route admin/sponsors/{type}/delete
		 * 	@method POST
		 *	@desc Route to remove specific records related to sponsors {agreements|accounts|signage}
		 */
		Route::post('/{type}/delete', 'SponsorsController@delete')->name('delete');
		
		/** @route admin/sponsors/{type}/{formType} {agreements|accounts|signage}/[new|edit]
		 * 	@method POST
		 *	@desc Route to submit changes when creating or editing
		 */
		Route::post('/{type}/{formType}', 'SponsorsController@submit')->name('submit');
		
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
| Website Routes
|--------------------------------------------------------------------------
*/

Route::name('website.')->namespace('Website')->group(function () {
	
	/* Our zoo category with related subcategories */
	Route::prefix('our-zoo')->name('ourZoo.')->group(function () {
		
		/*
		|--------------------------------------------------------------------------
		| Attractions
		|--------------------------------------------------------------------------
		*/
		
		/** @route /our-zoo/attractions/{id?}
		 * 	@method GET
		 *	@desc Route to access the attractions section
		 */
		Route::get('/attractions/{id?}', 'AttractionsController@show')->name('attractions.show');
		
		/*----------------------------------------------------*/

		
		
		/*
		|--------------------------------------------------------------------------
		| Opening Times
		|--------------------------------------------------------------------------
		*/
		
		/** @route /our-zoo/opening-times
		 * 	@method GET
		 *	@desc Route to access the opening times section
		 */
		Route::get('/opening-times', 'OpeningTimesController@show')->name('openingTimes.show');
		
		/*----------------------------------------------------*/
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Map and Directions
		|--------------------------------------------------------------------------
		*/
		
		/** @route /our-zoo//map-and-directions
		 * 	@method GET
		 *	@desc Route to access the map and directions section
		 */
		Route::get('/map-and-directions', 'MapAndDirectionsController@show')->name('mapAndDirections.show');
		
		/*----------------------------------------------------*/
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Animals
		|--------------------------------------------------------------------------
		*/
		
		/** @route /our-zoo/{type}/{id?}
		 * 	@method GET
		 *	@desc Route to access the animals section either by type or individual animals by id
		 */
		Route::get('/{type}/{id?}', 'AnimalsController@show')->name('animals.show');
		
		//		/** @route animals/{type}/{id}
		//		 * 	@method GET
		//		 *	@desc Route to access a specific animal
		//		 */
		//		Route::get('/animals/{type}/', 'AnimalsController@show')->name('animals.showOne');
		
		/*----------------------------------------------------*/
	
	});
	
	/* Experiences category with related subcategories */
	Route::prefix('experiences')->name('experiences.')->group(function () {
		
		/*
		|--------------------------------------------------------------------------
		| Map and Directions
		|--------------------------------------------------------------------------
		*/
		
		/** @route /experiences/map-and-directions
		 * 	@method GET
		 *	@desc Route to access the map and directions section
		 */
		Route::get('/map-and-directions', 'MapAndDirectionsController@show')->name('mapAndDirections.show');
		
		/*----------------------------------------------------*/
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Current Events
		|--------------------------------------------------------------------------
		*/
		
		/** @route /experiences/events/{id?}
		 * 	@method GET
		 *	@desc Route to access the news section
		 */
		Route::get('/events/{id?}', 'EventsController@show')->name('events.show');
		
		/*----------------------------------------------------*/
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Current News
		|--------------------------------------------------------------------------
		*/
		
		/** @route /experiences/news/{id?}
		 * 	@method GET
		 *	@desc Route to access the news section
		 */
		Route::get('/news/{id?}', 'NewsController@show')->name('news.show');
		
		/*----------------------------------------------------*/
		
	});
	
	
	
	/* Experiences category with related subcategories */
	Route::prefix('more-info')->name('moreInfo.')->group(function () {
		
		/*
		|--------------------------------------------------------------------------
		| About Us
		|--------------------------------------------------------------------------
		*/
		
		/** @route /more-info/about-us
		 * 	@method GET
		 *	@desc Route to access the about us section
		 */
		Route::get('/about-us', 'AboutUsController@show')->name('aboutUs.show');
		
		/*----------------------------------------------------*/
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Contact Details
		|--------------------------------------------------------------------------
		*/
		
		/** @route /more-info/contact-details
		 * 	@method GET
		 *	@desc Route to access the contact details section
		 */
		Route::get('/contact-details', 'ContactUsController@show')->name('contactDetails.show');
		
		/*----------------------------------------------------*/
	
	});
	
	/*
	|--------------------------------------------------------------------------
	| Tickets and Passes
	|--------------------------------------------------------------------------
	*/
	
	/** @route /tickets-and-passes
	 * 	@method GET
	 *	@desc Route to access the tickets section
	 */
	Route::get('/tickets-and-passes', 'TicketsController@show')->name('ticketsAndPasses.show');
	
	/*----------------------------------------------------*/
	
	
	
	
	/*
	|--------------------------------------------------------------------------
	| Welcome page
	|--------------------------------------------------------------------------
	*/
	
	/** @route /
	 * 	@method GET
	 *	@desc Route to access the website landing page
	 */
	Route::get('/', 'HomeController@show')->name('welcome');
	
	/*----------------------------------------------------*/
	
});

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

/*----------------------------------------------------*/


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

/*----------------------------------------------------*/


/*-------------------------- Website Routes END --------------------------*/
