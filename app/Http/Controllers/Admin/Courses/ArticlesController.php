<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository as ArticleRepository;

class ArticlesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Articles Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ArticleRepository $articleRepo)
	{
		$this->repository = $articleRepo;
		$this->menuTab = 'articles';
	}

	/**
	 * Show the index of Articles.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = $this->repository->getArticles();
		$menuTab = $this->menuTab;
		return response()->view('admin.articles.index', compact(['articles', 'menuTab']));
	}

	/**
	 * Show an page to create a Article
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.articles.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Article
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
        	$newArticle = $this->repository->createArticle($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your Article was added!');
        return redirect()->action('Admin\Catalogue\ArticlesController@index');
	}

	/**
	 * Show an individual Article's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$article = $this->repository->getArticle($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.Articles.edit', compact(['article', 'menuTab']));
	}

	/**
	 * Update the newly created Article
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
        	$updatedArticle = $this->repository->updateArticle($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The article was updated!');
        return redirect()->action('Admin\Catalogue\ArticleController@edit', ['article' => $id]);
	}

	/**
	 * Archive the Article
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteArticle($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
