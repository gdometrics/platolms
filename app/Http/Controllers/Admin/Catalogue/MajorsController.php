<?php 

namespace App\Http\Controllers\Admin\Catalogue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MajorRepository as MajorRepository;

class MajorsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Majors Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(MajorRepository $majorRepo)
	{
		$this->repository = $majorRepo;
		$this->menuTab = 'majors';
	}

	/**
	 * Show the index of majors.
	 *
	 * @return Response
	 */
	public function index()
	{
		$majors = $this->repository->getMajors();
		$menuTab = $this->menuTab;
		return response()->view('admin.majors.index', compact(['majors', 'menuTab']));
	}

	/**
	 * Show an page to create a major
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.majors.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created major
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
        	$newMajor = $this->repository->createMajor($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your major was added!');
        return redirect()->action('Admin\Catalogue\MajorsController@index');
	}

	/**
	 * Show an individual major's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$major = $this->repository->getMajor($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.majors.edit', compact(['major', 'menuTab']));
	}

	/**
	 * Update the newly created major
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
        	$updatedMajor = $this->repository->updateMajor($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The major was updated!');
        return redirect()->action('Admin\Catalogue\MajorController@edit', ['major' => $id]);
	}

	/**
	 * Archive the major
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteMajor($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
