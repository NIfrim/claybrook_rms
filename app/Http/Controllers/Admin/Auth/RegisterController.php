<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
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
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
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
			'account_type' => ['required', 'string', 'max:45'],
			'title' => ['required', 'string', 'max:5'],
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
			'job_title' => ['required', 'string', 'max:45'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Employee
     */
    protected function create(array $data)
    {
		return Employee::create([
			'zoo_id' => $this->getZoo(env('APP_NAME'))->id,
			'account_type_id' => $data('account_type'),
			'title' => $data['title'],
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'job_title' => $data['job_title'],
			'active' => 1,
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
				return Auth::guard('admin');
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
