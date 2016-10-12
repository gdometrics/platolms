<?php 

namespace App\Http\Controllers\Admin\Catalogue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MinorRepository as MinorRepository;

class MinorsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Minors Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(MinorRepository $minorRepo)
	{
		$this->repository = $minorRepo;
		$this->menuTab = 'minors';
	}

	/**
	 * Show the index of Minors.
	 *
	 * @return Response
	 */
	public function index()
	{
		$minors = $this->repository->getMinors();
		$menuTab = $this->menuTab;
		return response()->view('admin.minors.index', compact(['minors', 'menuTab']));
	}

	/**
	 * Show an page to create a Minor
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.minors.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Minor
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
        	$newMinor = $this->repository->createMinor($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your Minor was added!');
        return redirect()->action('Admin\Catalogue\MinorsController@index');
	}

	/**
	 * Show an individual Minor's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$minor = $this->repository->getMinor($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.minors.edit', compact(['minor', 'menuTab']));
	}

	/**
	 * Update the newly created Minor
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
        	$updatedminor = $this->repository->updateMinor($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The minor was updated!');
        return redirect()->action('Admin\Catalogue\MinorController@edit', ['minor' => $id]);
	}

	/**
	 * Archive the Minor
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteMinor($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
