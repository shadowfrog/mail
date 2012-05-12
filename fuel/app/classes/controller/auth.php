<?php

Package::load('sentry');

class Controller_Auth extends Common {
	
	/**
	 * Login
	 */
	public function action_login()
	{
		$this->template->set('title', 'Login');
	}
	
	/**
	 * create an user without validation
	 */
	public function action_create()
	{
		if ($email = Input::post('email')
			and $password = Input::post('password'))
		{
			try
			{
			    // create the user - no activation required
			    $vars = array(
			    	'email'    => $email,
			    	'password' => $password,
			    );
			
			    $user_id = Sentry::user()->create($vars);
			
			    if ($user_id)
			    {
			        // the user was created - send email notifying user account was created
			    }
			    else
			    {
			        // something went wrong - shouldn't really happen
			    }
			}
			catch (SentryUserException $e)
			{
			    $errors = $e->getMessage(); // catch errors such as user exists or bad fields
			}
		}
		else
		{
			$this->template->set('register', \View::forge('form/register.twig'));
		}
	}
	
}
