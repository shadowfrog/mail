<?php

namespace Mail;

use \Email;
use \View;
use \Input;

class Controller_Mail extends \Backend\Common {
	
	/**
	 * creates a new email
	 */
	public function action_create()
	{
		$this->add_to_section('main', View::forge('form/mail/create.twig'), 'mail_create');
	}
	
	/**
	 * edit an existing email
	 */
	public function action_edit()
	{
		
	}
	
	/**
	 * send an existing email
	 */
	public function action_send()
	{
		$from = Input::post('from');
		$to = Input::post('to');
		$cc = Input::post('cc');
		$bcc = Input::post('bcc');
		$subject = Input::post('subject');
		$text = Input::post('subject');
			
		// Create an instance
		$email = Email::forge();
		
		// Set the from address
		$email->from($from);
		
		// Set the to address
		$email->to($to);
		
		// Set a subject
		$email->subject($subject);
		
		// And set the body.
		$email->body($text);
		
		try
		{
		    $email->send();
		}
		catch(\EmailValidationFailedException $e)
		{
		    // The validation failed
		}
		catch(\EmailSendingFailedException $e)
		{
		    // The driver could not send the email
		}
	}
	
	public function action_test()
	{
		$mailbox = Model_Mailbox::find(1);
	}
	
}
