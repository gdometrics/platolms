<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TemplateRepository as TemplateRepository;

class TemplatesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Templates Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(TemplateRepository $templateRepo)
	{
		$this->repository = $templateRepo;
		$this->menuTab = 'templates';
	}

	/**
	 * Show the index of Templates.
	 *
	 * @return Response
	 */
	public function index()
	{
		$templates = $this->repository->getTemplates();
		$menuTab = $this->menuTab;
		return response()->view('admin.templates.index', compact(['templates', 'menuTab']));
	}

	/**
	 * Show an Template to create a Template
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.templates.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Template
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
        	$newTemplate = $this->repository->createTemplate($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your template was added!');
        return redirect()->action('Admin\Catalogue\TemplatesController@index');
	}

	/**
	 * Show an individual Template's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$template = $this->repository->getTemplate($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.templates.edit', compact(['template', 'menuTab']));
	}

	/**
	 * Update the newly created Template
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
        	$updatedTemplate = $this->repository->updateTemplate($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The template was updated!');
        return redirect()->action('Admin\Catalogue\TemplateController@edit', ['template' => $id]);
	}

	/**
	 * Archive the Template
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteTemplate($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
