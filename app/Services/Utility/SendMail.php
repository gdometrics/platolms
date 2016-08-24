<?php 

namespace App\Services\Utility;

use Log;
use Mail;
use Exception;

class SendMail {

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
	public function sendMail(array $email){
		
		try {

			Mail::send($email['template'], $email, function($message) use ($email)
			{
			    $message->to($email['recipient_email'], $email['recipient_name'])->subject($email['subject']);
			});
			
			return 'Message Sent';
        
        }
        
        catch (Exception $e) 
        {
	        // Send do download page
	        Log::info('Mail failed to send: '.$email['recipient_email']);
        }
		
	}

}