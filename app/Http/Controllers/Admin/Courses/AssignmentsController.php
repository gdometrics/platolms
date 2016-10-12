<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AssignmentRepository as AssignmentRepository;

class AssignmentsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Assignments Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AssignmentRepository $assignmentRepo)
	{
		$this->repository = $assignmentRepo;
		$this->menuTab = 'assignments';
	}

	/**
	 * Show the index of Assignments.
	 *
	 * @return Response
	 */
	public function index()
	{
		$assignments = $this->repository->getAssignments();
		$menuTab = $this->menuTab;
		return response()->view('admin.assignments.index', compact(['assignments', 'menuTab']));
	}

	/**
	 * Show an page to create a Assignment
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.assignments.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Assignment
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
        	$newAssignment = $this->repository->createAssignment($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your assignment was added!');
        return redirect()->action('Admin\Catalogue\AssignmentsController@index');
	}

	/**
	 * Show an individual Assignment's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$assignment = $this->repository->getAssignment($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.assignments.edit', compact(['assignment', 'menuTab']));
	}

	/**
	 * Update the newly created Assignment
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
        	$updatedAssignment = $this->repository->updateAssignment($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The assignment was updated!');
        return redirect()->action('Admin\Catalogue\AssignmentController@edit', ['assignment' => $id]);
	}

	/**
	 * Archive the Assignment
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteAssignment($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
