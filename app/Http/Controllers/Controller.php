<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
	 * Flash the error message and return to the previous view
	 *
	 * @return string
	 */
	function flashErrorAndReturnWithMessage($exception)
	{
		if (env('APP_DEBUG'))
		{
	    	dd($exception);
		}

        // returns back with ERROR message
        flash()->error('There was a problem processing your request.');
        return redirect()->back()->withInput()->withErrors($exception->getMessage());
	}
}
