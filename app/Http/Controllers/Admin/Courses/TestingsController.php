<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TestingRepository as TestingRepository;

class TestingsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Testings Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(TestingRepository $testingRepo)
	{
		$this->repository = $testingRepo;
		$this->menuTab = 'testings';
	}

	/**
	 * Show the index of Testings.
	 *
	 * @return Response
	 */
	public function index()
	{
		$testings = $this->repository->getTestings();
		$menuTab = $this->menuTab;
		return response()->view('admin.testings.index', compact(['testings', 'menuTab']));
	}

	/**
	 * Show an Testing to create a Testing
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.testings.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Testing
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
        	$newTesting = $this->repository->createTesting($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your test was added!');
        return redirect()->action('Admin\Catalogue\TestingsController@index');
	}

	/**
	 * Show an individual Testing's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$test = $this->repository->getTesting($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.testings.edit', compact(['test', 'menuTab']));
	}

	/**
	 * Update the newly created Testing
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
        	$updatedTesting = $this->repository->updateTesting($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The test was updated!');
        return redirect()->action('Admin\Catalogue\TestingController@edit', ['test' => $id]);
	}

	/**
	 * Archive the Testing
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteTesting($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
