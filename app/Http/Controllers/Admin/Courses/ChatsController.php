<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ChatRepository as ChatRepository;

class ChatsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Chats Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ChatRepository $chatRepo)
	{
		$this->repository = $chatRepo;
		$this->menuTab = 'chats';
	}

	/**
	 * Show the index of Chats.
	 *
	 * @return Response
	 */
	public function index()
	{
		$chats = $this->repository->getChats();
		$menuTab = $this->menuTab;
		return response()->view('admin.chats.index', compact(['chats', 'menuTab']));
	}

	/**
	 * Show an page to create a Chat
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.chats.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Chat
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
        	$newChat = $this->repository->createChat($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your chat was added!');
        return redirect()->action('Admin\Catalogue\ChatsController@index');
	}

	/**
	 * Show an individual Chat's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$chat = $this->repository->getChat($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.chats.edit', compact(['chat', 'menuTab']));
	}

	/**
	 * Update the newly created Chat
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
        	$updatedChat = $this->repository->updateChat($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The chat was updated!');
        return redirect()->action('Admin\Catalogue\ChatController@edit', ['chat' => $id]);
	}

	/**
	 * Archive the Chat
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteChat($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
