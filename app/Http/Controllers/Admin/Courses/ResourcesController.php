<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ResourceRepository as ResourceRepository;

class ResourcesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Resources Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ResourceRepository $resourceRepo)
	{
		$this->repository = $resourceRepo;
		$this->menuTab = 'resources';
	}

	/**
	 * Show the index of Resources.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resources = $this->repository->getResources();
		$menuTab = $this->menuTab;
		return response()->view('admin.resources.index', compact(['resources', 'menuTab']));
	}

	/**
	 * Show an Resource to create a Resource
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.resources.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Resource
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = $this->validate($request, [
        	//
        ]);

        try
        {
        	$newResource = $this->repository->createResource($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your resource was added!');
        return redirect()->action('Admin\Catalogue\ResourcesController@index');
	}

	/**
	 * Show an individual Resource's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$resource = $this->repository->getResource($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.resources.edit', compact(['resource', 'menuTab']));
	}

	/**
	 * Update the newly created Resource
	 *
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $validator = $this->validate($request, [
        	//
        ]);

        try
        {
        	$updatedResource = $this->repository->updateResource($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The resource was updated!');
        return redirect()->action('Admin\Catalogue\ResourceController@edit', ['resource' => $id]);
	}

	/**
	 * Archive the Resource
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteResource($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
