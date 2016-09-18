<?php 

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository as PostRepository;

class PostsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Posts Controller
	|--------------------------------------------------------------------------
	*/

	public function __construct(PostRepository $postRepo)
	{
		$this->repository = $postRepo;
		$this->menuTab = 'posts';
	}

	/**
	 * Show the posts panel
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->repository->paginatePosts([], 20, false);
		$menuTab = $this->menuTab;
		return response()->view('admin.posts.index', compact(['posts', 'menuTab']));
	}

	/**
	 * Show an page to create a post
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.posts.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created post
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = $this->validate($request, [
            'title' => 'required',
        ]);

    	// send to the post repository
        try
        {
        	$newPost = $this->repository->createPost($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your post was added!');
        return redirect()->action('Admin\Accounts\PostsController@index');
	}

}
