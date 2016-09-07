<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayoutsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Layouts Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

}
