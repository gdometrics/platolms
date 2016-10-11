<?php 

namespace App\Http\Controllers\Admin\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository as CourseRepository;

class CoursesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Courses Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(CourseRepository $courseRepo)
	{
		$this->repository = $courseRepo;
		$this->menuTab = 'courses';
	}

	/**
	 * Show the index of Courses.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = $this->repository->getCourses();
		$menuTab = $this->menuTab;
		return response()->view('admin.courses.index', compact(['courses', 'menuTab']));
	}

	/**
	 * Show an page to create a Course
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.courses.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Course
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
        	$newCourse = $this->repository->createCourse($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your course was added!');
        return redirect()->action('Admin\Catalogue\CoursesController@index');
	}

	/**
	 * Show an individual Course's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$course = $this->repository->getCourse($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.Courses.edit', compact(['course', 'menuTab']));
	}

	/**
	 * Update the newly created Course
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
        	$updatedCourse = $this->repository->updateCourse($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The course was updated!');
        return redirect()->action('Admin\Catalogue\CourseController@edit', ['course' => $id]);
	}

	/**
	 * Archive the Course
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteCourse($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
