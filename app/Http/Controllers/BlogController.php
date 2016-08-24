<?php 

namespace App\Http\Controllers;

use App\Http\Requests\BlogReplyRequest;
use App\Services\ReplyServices;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

use Laracasts\Flash\Flash;

class BlogController extends Controller
{

    /**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
        $this->posts = Post::orderBy('id', 'desc')->paginate();
    }

	/**
	 * Index of all blog posts
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = $this->posts;
		return view("blog.index", compact('posts') );
	}


	/**
	 * Show a single blog post
	 *
	 * @return view
	 */
	public function show($slug)
	{
        $posts = Post::orderBy('id', 'asc')->take(6)->get();
        
        // Get the single post
        $singlePost = Post::where('slug', $slug)->first();
        
		return view("blog.show", compact('posts', 'singlePost')  );
	}


	/**
	 * Show all blog categories
	 *
	 * @return view
	 */
	public function categories()
	{
        $posts = $this->posts;
        
        // Get the posts in a single category
        $categories = Category::all();

		return view("blog.category", compact('posts', 'categories')  );
	}


	/**
	 * Show all blogs in a single category
	 *
	 * @return response
	 */
	public function category($slug)
	{
        $posts = $this->posts;

        // Get the posts in a single category
        $categoryPosts = Category::with('posts')->where('slug', $slug)->get();
        
		return view("blog.category", compact('posts', 'categoryPosts')  );
	}


	/**
	 * Reply to a forum post
	 *
	 * @return view
	 */
	public function reply(BlogReplyRequest $request, ReplyServices $addReply, $slug)
	{
        $user = $this->user;

        try {
            
            $reply = $addReply->blog($request);
        
        } catch (Exception $e) 
        {
            
            // get all forum threads
            Flash::success('Sorry, we are unable to begin this reply. Please try again.');
            return back()->withInput();
           
        }

        // get all forum threads
        Flash::success('Your reply has been added!');
        $singlePost = Post::where('slug', $slug)->first();

		return view("forum.show", compact('user', 'singlePost') );
	}
    


}