<?php

namespace App\Services\Utility;

use Exception;
use File;
use Auth;
use Storage;
use Log;

class UploadFile
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
    public function uploadUserImage($file)
    {

       try {

            // return the filename in a string format
            return $this->upload($file, 'uploads/' . str_slug(\Auth::user()->name) . '/avatar/', 'public');
            
        } catch(Exception $e)
        {
            
            throw $e;
            
        } // end try/catch      

    }

    /**
     * The service provider to handle avatar uploads
     *
     * @return void
     */
    public function uploadTemporaryFile($file)
    {

       try {

            // return the filename in a string format
            return $this->upload($file, 'temp/'.date('dmyHis'));
            
        } catch(Exception $e)
        {
            
            throw $e;
            
        } // end try/catch
        
    }

    /**
     * The service provider to handle all uploads
     *
     * @return void
     */
    public function upload($file, $path_relative, $public = 'private')
    {

       try {

            //**** STEP 1 - CLEAN THE FILE NAME
            $fileNamed = $this->cleanAndTimeStampFileName($file->getClientOriginalName());

            //**** STEP 3 - MOVE TO A TEMPORARY LOCATION
            Storage::disk(env('FILESYSTEM'))->put($this->tempPath_relative . $fileNamed, file_get_contents($file), $public);

            if (Storage::disk(env('FILESYSTEM'))->exists($this->tempPath_relative . $fileNamed))
            {   
                //**** STEP 4 - UPLOAD TO THE FILESYSTEM
                try {

                    Storage::disk(env('FILESYSTEM'))->put($path_relative . $fileNamed, file_get_contents($file), $public);

                    // return the filename in a string format
                    return $fileNamed;

                } catch (Exception $e)
                {
                    // Send do download page
                    Log::info('File failed to make it to storage: '.$path_relative . $fileNamed);

                    // return the filename in a string format
                    return 'error';
                }
    
            }

            // Send do download page
            Log::info('File failed to make it to storage: '.$path_relative . $fileNamed);

            // return the filename in a string format
            return $this->tempPath_relative . $fileNamed;
            return 'File Not Found';            
            
        } catch(Exception $e)
        {
            
            throw $e;
            
        } // end try/catch      

    }
    
    /**
     * The helper function to clean and time stamp a file
     *
     * @return void
     */
    public function cleanAndTimeStampFileName($filename)
    {
        // clean the title
        $filename = strtolower( str_replace(" ","-",$filename) );
        $filename = preg_replace("/[^A-Za-z0-9. ]/","",$filename);
    
        // add the timestamp to the filename
        $filename = time() . '-' . $filename;   
        
        return $filename;
    }
    
    /**
     * The clean up function
     *
     * @return void
     */
    public function __destroy()
    {
        // cleanup the temp file directory
        $files = File::files($this->tempPath);
        if (is_array($files))
        {
            foreach ($files as $file)
            {
                // Check the time on the file and unlink it it's too old
                if(File::lastModified($file) < time() - $this->max_file_age)
                {
                    File::delete($file);    
                }
            } // END FOR EACH
        } // END IF $FILES
    }
    
}
