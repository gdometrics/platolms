<?php 

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository as RoleRepository;

class RolesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Roles Controller
	|--------------------------------------------------------------------------
	*/

	public function __construct(RoleRepository $roleRepo)
	{
		$this->repository = $roleRepo;
		$this->menuTab = 'roles';
	}

	/**
	 * Show the roles panel
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->repository->getAllRoles();
		$menuTab = $this->menuTab;
		return response()->view('admin.roles.index', compact(['roles', 'menuTab']));
	}

	/**
	 * Store the newly created role
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = $this->validate($request, [
            'name' => 'required',
        ]);

    	// send to the role repository
        try
        {
        	$newRole = $this->repository->createRole($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your user was added!');
        return redirect()->action('Admin\Accounts\UsersController@index');
	}

}
