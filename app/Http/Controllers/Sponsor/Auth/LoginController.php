<?php

namespace App\Http\Controllers\Sponsor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Zoo;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SPONSOR_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:sponsor')->except('logout');
    }
    
    public function showLoginForm()
	{
		return view('sponsor.auth.forms', [
			'category' => 'sponsor',
			'subcategory' => null,
			"loginRoute"=> 'sponsor.login',
			'registerRoute' => 'sponsor.register',
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])
		]);
	}
	
	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard()
	{
		return Auth::guard('sponsor');
	}
	
	/** Returns list of data using specified table
	 *  Accepts filters as array ['attribute', 'comparator', 'value'];
	 *
	 * @param string $table
	 * @param array|null $filters
	 *
	 * @return Model
	 */
	private function getData(string $table, ?array $filters = null) {
		$relations = $this->getRelations($table);
		
		if ($filters) {
			
			$data = call_user_func($this->getModel($table).'::with', $relations)->where($filters)->get();
			
		} else {
			
			$data = call_user_func($this->getModel($table).'::with', $relations)->get();
			
		}
		
		return $data;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param string $table
	 *
	 * @return String|null
	 */
	private function getModel(string $table) {
		
		switch ($table) {
			case 'zoos':
				return Zoo::class;
			
			default: return null;
		}
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		switch ($type) {
			
			default: return [];
		}
	}
}
