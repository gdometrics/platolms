<?php 

namespace App\Services\Utility;

use Log;
use Exception;

class InjestFile {

    protected $delimiter  = ',';
    protected $enclosure  = '"';
    protected $lineEnding = '\r\n';

	/**
	 * Charge a user for a repo
	 *
	 * @return view
	 */
	public function injest($file)
	{

		try {

			\Excel::load(storage_path() . '/app/temp/injestables/' . $file, function($reader) {

			    $this->results = $reader->toArray();

			});   
			
			return $this->results;

        } catch (Exception $e) 
        {
	        // Send do download page
	        Log::info('File failed to be injestd: '.$e);
        }
		
	}

}
