<?php 

namespace App\Http\Controllers;

use Exception;
use Log;
use Input;
use App\Http\Requests\RegistrationRequest;
use App\Services\Utility\SendMail;
use Laracasts\Flash\Flash;

class RegistrationController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Registration Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function registration(RegistrationRequest $request, SendMail $sendMail)
	{
		
		try {
	        // Send the update to the author
	        $sendMail->sendMail([
	            'subject' => 'You have a new submissions via App\'s website',
				'template' => 'emails.contact',				
				'recipient_name' => 'Jason Herndon',
				'recipient_email' => 'jason@App.com',
				'email_message' => implode(', ', $request['courses']),
				'reply_email' => $request['email'],
				'reply_name' => $request['name']
	        ]);

	    } catch (Exception $e)
	    {
	        // Send do download page
	        Log::info('Mail failed to send over here: '.$email['recipient_email']);
	    }

        Flash::success('Your email was sent. We will be in touch shortly');
		return back();

	}

}
