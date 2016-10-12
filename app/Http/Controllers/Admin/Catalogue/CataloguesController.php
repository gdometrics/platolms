<?php 

namespace App\Http\Controllers\Admin\Catalogue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CatalogueRepository as CatalogueRepository;

class CataloguesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Catalogues Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(CatalogueRepository $catalogueRepo)
	{
		$this->repository = $catalogueRepo;
		$this->menuTab = 'catalogues';
	}

	/**
	 * Show the index of catalgoues.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogues = $this->repository->getCatalogues();
		$menuTab = $this->menuTab;
		return response()->view('admin.catalogues.index', compact(['catalogues', 'menuTab']));
	}

	/**
	 * Show an page to create a catalogue
	 *
	 * @return Response
	 */
	public function create()
	{
		$menuTab = $this->menuTab;
	    return response()->view('admin.catalogues.create', compact(['menuTab']));
	}

	/**
	 * Store the newly created catalogue
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
        	$newCatalogue = $this->repository->createCatalogue($request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('Your catalogue was added!');
        return redirect()->action('Admin\Catalogue\CataloguesController@index');
	}

	/**
	 * Show an individual catalogue's profile
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogue = $this->repository->getCatalogue($id);
		$menuTab = $this->menuTab;
		return response()->view('admin.catalogues.edit', compact(['catalogue', 'menuTab']));
	}

	/**
	 * Update the newly created catalogue
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
        	$updatedCatalgoue = $this->repository->updateCatalogue($id, $request->all());

        } catch(\Exception $exception)
        {
            $this->flashErrorAndReturnWithMessage($exception);
        }

        // returns back with success message
        flash()->success('The catalogue was updated!');
        return redirect()->action('Admin\Catalogue\CatalogueController@edit', ['catalogue' => $id]);
	}

	/**
	 * Archive the catalogue
	 *
	 * @return Boolean
	 */
	public function destroy($id)
	{
        try
        {
        	$this->repository->deleteCatalogue($id);

        } catch(\Exception $exception)
        {
	        return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
	}

}
