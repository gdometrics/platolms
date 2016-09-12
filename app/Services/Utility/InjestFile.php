<?php 

namespace App\Services\Utility;

use Log;
use Exception;
use InjestCSV;
use InjestExcel;

class InjestFile {

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
	public function injest($file)
	{
		
		try {

			$csvOrXls = $file->getMimeType();

			switch ($mimeType)
			{
				case 'csv':

					$csvReader = new InjestCSV;
					return $csvReader->readCSV($file);

					break;

				case 'xls':

					$excelReader = new InjestExcel;
					return $excelReader->readExcel($file);

					break;

				default:

					$csvReader = new InjestCSV;
					return $csvReader->readCSV($file);

					break;
			}        

        } catch (Exception $e) 
        {
	        // Send do download page
	        Log::info('File failed to be injestd: '.$e);
        }
		
	}

}
