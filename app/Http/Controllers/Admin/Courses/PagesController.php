<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository as PageRepository;

class PagesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Pages Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(PageRepository $pageRepo)
	{
		$this->repository = $pageRepo;
		$this->menuTab = 'pages';
	}

	/**
	 * Show the index of Pages.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->repository->getPages();
		$menuTab = $this->menuTab;
		return response()->view('admin.pages.index', compact(['pages', 'menuTab']));
	}

	/**
	 * Show an page to create a Page
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.pages.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Page
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
        	$newPage = $this->repository->createPage($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your page was added!');
        return redirect()->action('Admin\Catalogue\PagesController@index');
	}

	/**
	 * Show an individual Page's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$page = $this->repository->getPage($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.pages.edit', compact(['page', 'menuTab']));
	}

	/**
	 * Update the newly created Page
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
        	$updatedPage = $this->repository->updatePage($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The page was updated!');
        return redirect()->action('Admin\Catalogue\PageController@edit', ['page' => $id]);
	}

	/**
	 * Archive the Page
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deletePage($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
