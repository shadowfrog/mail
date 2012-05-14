<?php

abstract class Common extends Controller_Hybrid {
	
	/**
	 * Use a twig template
	 */
	public $template = 'template.twig';
	
	/**
	 * html title of the page
	 */
	private $title = 'Mail';
	
	/**
	 * all sections
	 */
	protected $_sections = array();
	
	/**
	 * current user
	 */
	private static $user = false;
	
	public function before()
	{
		parent::before();
	}
	
	public function after($response)
	{
		$this->template->set('title', $this->_title);
		$this->template->set('sections', $this->_sections);
		
		return parent::after($response);
	}
	
	/**
	 * set the current user
	 * @param Object	| The user Object
	 */
	protected static function set_user($user)
	{
		self::$user = $user;
	}
	
	/**
	 * get the current user
	 */
	public static function get_user()
	{
		return self::$user;
	
	/**
	 * set the page title
	 */
	protected static function set_title($title = 'Mail')
	{
		self::$title = $title;
	}
}
