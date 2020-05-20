<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
	public $category = 'animals', $subcategory, $title, $idTemplate;
	
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
	/**
	 * Show all the birds records.
	 *
	 */
	public function index()
	{
		// Override the function with own implementation
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $formType new|edit
	 *
	 */
	public function showAnimalForm(String $formType)
	{
		// Override this function with own implementation
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param  array  $data
	 */
	protected function validator(array $data)
	{
		// Override this function with own implementation
	}
	
	/**
	 * Return only specific columns from rows.
	 *
	 * @param array $rows
	 * @param String $column
	 *
	 * @return array
	 */
	protected function getArrayFromRows(array $rows, String $column) {
		$arr = [];
		
		foreach ($rows as $row) {
			if ($row->$column) {
				array_push($arr, $row->$column);
			}
		}
		
		return $arr;
	}
	
	/**
	 * Return only specific columns from rows.
	 *
	 * @param String $str
	 *
	 * @return integer
	 */
	protected function getNumberFromString(String $str) {
		preg_match('!\d+!', $str, $matches);
		return $matches[0];
	}
}
