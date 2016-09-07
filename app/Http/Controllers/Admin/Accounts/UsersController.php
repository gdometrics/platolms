<?php 

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as UserRepository;

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
	 * Show an individual user's profile
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = \App\Models\User::find($id);
		return response()->view('admin.users.show', compact(['user']));
	}

	/**
	 * Show the create for for users
	 *
	 * @return Response
	 */
	public function create()
	{
		return response()->view('admin.users.create');
	}

	/**
	 * Store the newly created user
	 *
	 * @return Response
	 */
	public function store(Request $request, UserRepository $userRepo)
	{
        $validator = $this->validate($request, [
            'first' => 'required',
            'last' => 'required',
            'email' => 'required',
        ]);

    	// send to the user repository
        try
        {
        	$newUser = $userRepo->createUser($request->all());
dd($newUser);
        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);

        }

        // returns back with success message
        flash()->success('Your user was added!');
        return redirect()->action('Admin\Accounts\UsersController@index');

	}
}
