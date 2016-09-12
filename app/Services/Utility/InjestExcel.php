<?php 

namespace App\Services\Utility;

use Log;
use Exception;

class InjestExcel {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Charge a user for a repo
	 *
	 * @return view
	 */
	public function readExcel($file)
	{
		
		try {

			return true;
        
        } catch (Exception $e) 
        {
	        // Send do download page
	        Log::info('Failed to read Excel file: '.$file);
        }
		
	}

}