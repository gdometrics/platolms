<?php 

namespace App\Http\Controllers\Admin\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AssetRepository as AssetRepository;

class AssetsController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Assets Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AssetRepository $assetRepo)
	{
		$this->repository = $assetRepo;
		$this->menuTab = 'assets';
	}

	/**
	 * Show the index of Assets.
	 *
	 * @return Response
	 */
	public function index()
	{
		$assets = $this->repository->getAssets();
		$menuTab = $this->menuTab;
		return response()->view('admin.assets.index', compact(['assets', 'menuTab']));
	}

	/**
	 * Show an page to create a Asset
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.assets.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created Asset
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
        	$newAsset = $this->repository->createAsset($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your asset was added!');
        return redirect()->action('Admin\Catalogue\AssetsController@index');
	}

	/**
	 * Show an individual Asset's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$asset = $this->repository->getAsset($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.assets.edit', compact(['asset', 'menuTab']));
	}

	/**
	 * Update the newly created Asset
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
        	$updatedAsset = $this->repository->updateAsset($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The asset was updated!');
        return redirect()->action('Admin\Catalogue\AssetController@edit', ['asset' => $id]);
	}

	/**
	 * Archive the Asset
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteAsset($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
