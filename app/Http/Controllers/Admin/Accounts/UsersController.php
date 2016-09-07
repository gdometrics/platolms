<?php 

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Users Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Show the users panel
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = \App\Models\User::get();
		return response()->view('admin.users.index', compact(['users']));
	}

	/**
	 * Show the users panel
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = \App\Models\User::find($id);
		return response()->view('admin.users.show', compact(['user']));
	}

}
