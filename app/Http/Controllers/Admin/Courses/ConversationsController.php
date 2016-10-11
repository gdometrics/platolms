<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ConversationRepository as ConversationRepository;

class ConversationsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Conversations Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ConversationRepository $conversationRepo)
	{
		$this->repository = $conversationRepo;
		$this->menuTab = 'conversations';
	}

	/**
	 * Show the index of Conversations.
	 *
	 * @return Response
	 */
	public function index()
	{
		$conversations = $this->repository->getConversations();
		$menuTab = $this->menuTab;
		return response()->view('admin.conversations.index', compact(['conversations', 'menuTab']));
	}

	/**
	 * Show an page to create a Conversation
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.conversations.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Conversation
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
        	$newConversation = $this->repository->createConversation($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your conversation was added!');
        return redirect()->action('Admin\Catalogue\ConversationsController@index');
	}

	/**
	 * Show an individual Conversation's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$conversation = $this->repository->getConversation($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.conversations.edit', compact(['conversation', 'menuTab']));
	}

	/**
	 * Update the newly created Conversation
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
        	$updatedConversation = $this->repository->updateConversation($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The conversation was updated!');
        return redirect()->action('Admin\Catalogue\ConversationController@edit', ['conversation' => $id]);
	}

	/**
	 * Archive the Conversation
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteConversation($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
