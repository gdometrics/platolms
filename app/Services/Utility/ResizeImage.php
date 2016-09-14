<?php

namespace App\Services\Utility;

use Exception;
use File;
use Storage;
use Log;

class ResizeImage
{

    /**
     * The construct magic method
     *
     * @return void
     */
    public function __construct()
    {
        $this->tempPath = storage_path() . 'app/temp/';
        $this->tempPath_relative = '/temp/';
    }

    /**
     * The service provider to handle avatar uploads
     *
     * @return void
     */
    public function resizeImage($file, $path)
    {

       try {

		    // check for a resized img
			if (!File::isDirectory($path . 'resized/') and $path . 'resized/') 
			{
				File::makeDirectory($path . 'resized/', 0777, true);
			}

			// open an img file
			$image = \Image::make($path . $file);
			
			// resize img instance
			$image->resize(Config::get('settings.user_image_resize'), Config::get('settings.user_image_resize'));
			
			// save img in desired format
			$image->save($path . 'resized/' . $file);

            // return the filename in a string format
            return $path . 'resized/' . $file;
            
        } catch(Exception $e) {

            throw $e;

        } // end try/catch      

    }
    
}