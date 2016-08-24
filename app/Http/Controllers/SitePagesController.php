<?php 

namespace App\Http\Controllers;

use Exception;
use Log;
use Input;
use App\Http\Requests\ContactRequest;
use App\Services\Utility\SendMail;
use Laracasts\Flash\Flash;

class SitePagesController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| SitePages Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function about()
	{
		return view('pages.about');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function features()
	{
		return view('pages.features');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function faq()
	{
		return view('pages.faq');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function contact()
	{
		return view('pages.contact');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function processContact(ContactRequest $request, SendMail $sendMail)
	{

		try {
	        // Send the update to the author
	        $sendMail->sendMail([
	            'subject' => 'You have a new contact via App\'s website',
				'template' => 'emails.contact',				
				'recipient_name' => 'Jason Herndon',
				'recipient_email' => 'jason@App.com',
				'email_message' => $request['email_message'],
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

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function courses()
	{
		return view('pages.courses');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function coursesKids()
	{
		return view('pages.courses_kids');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function coursesTeens()
	{
		return view('pages.courses_teens');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function tracks()
	{
		return view('pages.tracks');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function charterSchools()
	{
		return view('pages.charter_schools');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function processCharterSchools(ContactRequest $request, SendMail $sendMail)
	{

		try {
	        // Send the update to the author
	        $sendMail->sendMail([
	            'subject' => 'You have a new contact via App\'s website',
				'template' => 'emails.contact',				
				'recipient_name' => 'Jason Herndon',
				'recipient_email' => 'jason@App.com',
				'email_message' => $request['email_message'],
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
