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
		return response()->view('admin.categories.index', compact(['categories', 'menuTab']));
	}

	/**
	 * Show the page to create a category
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.categories.create', compact(['menuTab', 'request']));
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

}
