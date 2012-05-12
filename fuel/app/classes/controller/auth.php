<?php

class Controller_Auth extends Common {
	
	/**
	 * Login
	 */
	public function action_login()
	{
		$this->template->set('title', 'Login');
	}
	
}
