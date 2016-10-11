<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LayoutRepository as LayoutRepository;

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
	public function __construct(LayoutRepository $layoutRepo)
	{
		$this->repository = $layoutRepo;
		$this->menuTab = 'layouts';
	}

	/**
	 * Show the index of Layouts.
	 *
	 * @return Response
	 */
	public function index()
	{
		$layouts = $this->repository->getLayouts();
		$menuTab = $this->menuTab;
		return response()->view('admin.layouts.index', compact(['layouts', 'menuTab']));
	}

	/**
	 * Show an page to create a Layout
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.layouts.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Layout
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
        	$newLayout = $this->repository->createLayout($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your layout was added!');
        return redirect()->action('Admin\Catalogue\LayoutsController@index');
	}

	/**
	 * Show an individual Layout's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$layout = $this->repository->getLayout($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.Layouts.edit', compact(['layout', 'menuTab']));
	}

	/**
	 * Update the newly created Layout
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
        	$updatedLayout = $this->repository->updateLayout($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The layout was updated!');
        return redirect()->action('Admin\Catalogue\LayoutController@edit', ['layout' => $id]);
	}

	/**
	 * Archive the Layout
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteLayout($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
