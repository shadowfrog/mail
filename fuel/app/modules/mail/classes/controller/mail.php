<?php

namespace Mail;

use \Email;

class Controller_Mail extends \Backend\Common {
	
	/**
	 * creates a new email
	 */
	public function action_create()
	{
		
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
		// get the mailbox
		$mailbox = Model_Mailbox::find(1);
		//\Debug::dump($mailbox->outbox);
		
		// Create an instance
		$email = \Email::forge(array(
		    'driver' => 'smtp',
		));
		
		$email->set_config('host', $mailbox->outbox);
		$email->set_config('port', 25);
		$email->set_config('username', $mailbox->box_account);
		$email->set_config('password', $mailbox->box_password);
		
		// Set the from address
		$email->from('test@mailer.dev', 'I am a Mailer');
		
		// Set the to address
		$email->to('sebastian.wohlfarth@gmail.com', 'Sebastian Wohlfahrt');
		
		// Set a subject
		$email->subject('Eine Test-E-Mail');
		
		// Set multiple to addresses
		/*
		$email->to(array(
		    'example@mail.com',
		    'another@mail.com' => 'With a Name',
		);
		*/
		
		// And set the body.
		$email->body('This is my message');
		
		try
		{
		    $email->send();
		}
		catch(\EmailValidationFailedException $e)
		{
		    // The validation failed
		    \Debug::dump($e);
		}
		catch(\EmailSendingFailedException $e)
		{
		    // The driver could not send the email
		    \Debug::dump($e);
		}
	}
	
	public function action_test()
	{
		$mailbox = Model_Mailbox::find(1);
	}
	
}
