<?php

namespace App\Http\Controllers\Sponsor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\Zoo;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:sponsor');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
				return Validator::make($data, [
					'title' => ['required', 'string', 'title', 'max:5'],
					'first_name' => ['required', 'string', 'name', 'max:255'],
					'last_name' => ['required', 'string', 'name', 'max:255'],
					'email' => ['required', 'string', 'email', 'max:255', 'unique:sponsors'],
					'job_title' => ['required', 'string', 'max:45'],
					'primary_contact_number' => ['required', 'string', 'phone', 'max:15', 'unique:sponsors'],
					'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Sponsor
     */
    protected function create(array $data)
    {
    		$zooId = $this->getZoo(env('APP_NAME'))->id;
				return Sponsor::create([
					'zoo_id' => $zooId,
					'title' => $data['title'],
					'first_name' => $data['first_name'],
					'last_name' => $data['last_name'],
					'email' => $data['email'],
					'job_title' => $data['job_title'],
					'primary_contact_number' => $data['primary_contact_number'],
					'password' => Hash::make($data['password']),
				]);
    }
		
		/**
		 * Get the guard to be used during registration.
		 *
		 * @return \Illuminate\Contracts\Auth\StatefulGuard
		 */
		protected function guard()
		{
				return Auth::guard('sponsor');
		}
		
		/**
		 * Get the zoo attributes
		 *
		 * @param String $name
		 *
		 * @return \Illuminate\Database\Eloquent\Collection
		 */
		protected function getZoo(String $name) {
				return Zoo::all()->where('name', '=', $name)->first();
		}
}
