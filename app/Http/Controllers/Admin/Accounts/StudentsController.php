<?php 

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Students Controller
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
		$this->menuTab = 'students';
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = \App\Models\User::whereHas(
		    'roles', function($q){
		        $q->where('name', env('STUDENT_LABEL', 'Student'));
		    })->paginate();
		$roles = \App\Models\Role::all();
		$menuTab = $this->menuTab;
		$title = 'Students';
		return response()->view('admin.users.index', compact(['users', 'title', 'roles', 'menuTab']));
	}

}
