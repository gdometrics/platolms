<?php 

namespace App\Http\Controllers\Admin\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository as CategoryRepository;

class CategoriesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Categories Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(CategoryRepository $categoryRepo)
	{
		$this->repository = $categoryRepo;
		$this->menuTab = 'categories';
	}

	/**
	 * Show the categories panel
	 *
	 * @return Response
	 */
	public function index()
	{
		$menuTab = $this->menuTab;
		$categories = $this->repository->getCategories();
		return response()->view('admin.site.categories.index', compact(['categories', 'menuTab']));
	}

	/**
	 * Show the page to create a category
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.site.categories.create', compact(['menuTab', 'request']));
	}

	/**
	 * Store the newly created category
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
        ]);

    	// send to the category repository
        try
        {
        	$newCategory = $this->repository->createCategory($request->all());

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        // returns back with success message
        return response()->json(['success' => true, 'category' => $newCategory]);
	}

	/**
	 * Show an individual Category's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$category = $this->repository->getCategory($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.site.categories.edit', compact(['category', 'menuTab']));
	}

	/**
	 * Update the post
	 *
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $validator = $this->validate($request, [
            'title' => 'required',
        ]);

        try
        {
        	$updatedUser = $this->repository->updateCategory($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The category was updated!');
        return redirect()->action('Admin\Site\CategoriesController@edit', ['category' => $id]);
	}
}
