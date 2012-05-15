<?php

Package::load('sentry');

class Controller_Auth extends \Backend\Common {
	
	/**
	 * Login
	 */
	public function action_login()
	{
		$this->_title = 'Login';
	}
	
	/**
	 * Logout
	 */
	public function action_logout()
	{
		// log the user out
		Sentry::logout();
		
		// than redirect to login page
		Response::redirect('auth/login');
	}
	
	/**
	 * create an user without validation
	 */
	public function action_register()
	{
		if ($email = Input::post('email')
			and $password = Input::post('password'))
		{
			try
			{
			    // create the user
			    $user = Sentry::user()->create(array( //TODO: replace throught register
			        'email'    => $email,
			    	'password' => $password,
			    	'metadata' => array(
			    		'first_name' => Input::post('firstname'),
			    		'last_name'  => Input::post('lastname'),
			    		// add any other fields you want in your metadata here. ( must add to db table first )
			    	)
			    ));
			
			    if ($user)
			    {
			        // the user was created			
			        // send email with link to activate.
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
	}
	
}
