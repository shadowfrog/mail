<?php

class View_Login extends \ViewModel {
	
	public function view()
	{
		$this->login();
	}
	
	public function login()
	{
		$this->_sections['main']['login'] = View::forge('form/login.twig');
	}
	
	public function register()
	{
		$this->_sections['main']['login'] = View::forge('form/register.twig');
	}
	
	public function combined()
	{
		$this->login();
		$this->register();
	}
	
}
