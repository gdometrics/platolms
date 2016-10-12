<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LessonRepository as LessonRepository;

class LessonsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Lessons Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(LessonRepository $lessonRepo)
	{
		$this->repository = $lessonRepo;
		$this->menuTab = 'lessons';
	}

	/**
	 * Show the index of Lessons.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons = $this->repository->getLessons();
		$menuTab = $this->menuTab;
		return response()->view('admin.lessons.index', compact(['lessons', 'menuTab']));
	}

	/**
	 * Show an page to create a Lesson
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.lessons.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Lesson
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
        	$newLesson = $this->repository->createLesson($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your lesson was added!');
        return redirect()->action('Admin\Catalogue\LessonsController@index');
	}

	/**
	 * Show an individual Lesson's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$lesson = $this->repository->getLesson($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.lessons.edit', compact(['lesson', 'menuTab']));
	}

	/**
	 * Update the newly created Lesson
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
        	$updatedLesson = $this->repository->updateLesson($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The lesson was updated!');
        return redirect()->action('Admin\Catalogue\LessonController@edit', ['lesson' => $id]);
	}

	/**
	 * Archive the Lesson
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteLesson($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
