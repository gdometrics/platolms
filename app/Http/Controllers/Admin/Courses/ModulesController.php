<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ModuleRepository as ModuleRepository;

class ModulesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Modules Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ModuleRepository $moduleRepo)
	{
		$this->repository = $moduleRepo;
		$this->menuTab = 'modules';
	}

	/**
	 * Show the index of Modules.
	 *
	 * @return Response
	 */
	public function index()
	{
		$modules = $this->repository->getModules();
		$menuTab = $this->menuTab;
		return response()->view('admin.modules.index', compact(['modules', 'menuTab']));
	}

	/**
	 * Show an page to create a Module
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.modules.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Module
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
        	$newModule = $this->repository->createModule($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your module was added!');
        return redirect()->action('Admin\Catalogue\ModulesController@index');
	}

	/**
	 * Show an individual module's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$module = $this->repository->getModule($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.Modules.edit', compact(['module', 'menuTab']));
	}

	/**
	 * Update the newly created Module
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
        	$updatedModule = $this->repository->updateModule($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The module was updated!');
        return redirect()->action('Admin\Catalogue\ModuleController@edit', ['module' => $id]);
	}

	/**
	 * Archive the Module
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteModule($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
