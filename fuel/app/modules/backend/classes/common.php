<?php

namespace Backend;

\Package::load('sentry');

use \Config;
use \Sentry;
use \Uri;
use \Response;
use \Input;
use \View;
use \ViewModel;

abstract class Common extends \Common {

	public function before()
	{
		parent::before();
		
		// check if user is logged in
		if($this->check_login())
		{
			// render navigation etc...
			$this->add_to_section('left', View::forge('backend/navigation.twig'), 'navigation');
		}
		else
		{
			$this->add_to_section('main', View::forge('form/login.twig'), 'login');
			$this->add_to_section('main', View::forge('form/register.twig'), 'register');
		}
	}
	
	/**
	 * check if a user is logged in
	 */
	public static function check_login()
	{
		if (! Sentry::check())
		{
			// no, user not logged in
			$uri = Uri::segments();
			
			if($uri === array('auth', 'login'))
			{
				// yes, we are on login page
				if($email = Input::post('email') and $password = Input::post('password'))
				{
					// email and password are set
					// try to log a user in
					try
					{
					    // log the user in		
					    if (Sentry::login($email, $password, Input::post('remember_login', false)))
					    {
					    	Response::redirect('backend/dashboard/index');
					    }
					    else
					    {
					        // could not log the user in
					        Response::redirect('auth/login');
					    }
					
					}
					catch (SentryAuthException $e)
					{
					    // issue logging in via Sentry - lets catch the sentry error thrown
					    // store/set and display caught exceptions such as a suspended user with limit attempts feature.
					    $errors = $e->getMessage();
					}
				}
				else
				{
					// no login credentials where submitted
					
				}
			}
		}
		else
		{
			// already logged in
			static::set_user(Sentry::user());
							
	        // the user is now logged in - do your own logic
	        if(static::check_permission())
			{
				// the user has permissions
				return true;
			}
			else
			{
				// no he doesn't have permission to access this
				die('You\'re not allowed');
			}
		}
	}

	/*
	 * Check if the user has permission to use that page
	 * TODO: has to be implemented
	 */
	public static function check_permission()
	{
		return true;
	}
	
}