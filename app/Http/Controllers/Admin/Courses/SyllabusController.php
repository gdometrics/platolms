<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SyllabusRepository as SyllabusRepository;

class SyllabusController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Syllabuss Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(SyllabusRepository $syllabusRepo)
	{
		$this->repository = $syllabusRepo;
		$this->menuTab = 'syllabi';
	}

	/**
	 * Show the index of Syllabuss.
	 *
	 * @return Response
	 */
	public function index()
	{
		$syllabi = $this->repository->getSyllabuss();
		$menuTab = $this->menuTab;
		return response()->view('admin.syllabi.index', compact(['syllabi', 'menuTab']));
	}

	/**
	 * Show an Syllabus to create a Syllabus
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.syllabi.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Syllabus
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
        	$newSyllabus = $this->repository->createSyllabus($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your syllabus was added!');
        return redirect()->action('Admin\Catalogue\SyllabusController@index');
	}

	/**
	 * Show an individual Syllabus's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$syllabus = $this->repository->getSyllabus($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.syllabi.edit', compact(['syllabus', 'menuTab']));
	}

	/**
	 * Update the newly created Syllabus
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
        	$updatedSyllabus = $this->repository->updateSyllabus($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The syllabus was updated!');
        return redirect()->action('Admin\Catalogue\SyllabusController@edit', ['syllabus' => $id]);
	}

	/**
	 * Archive the Syllabus
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteSyllabus($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
