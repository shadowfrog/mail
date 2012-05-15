<?php

abstract class Common extends Controller_Hybrid {
	
	/**
	 * current theme
	 */
	private static $theme = '';
	/**
	 * Use a twig template
	 */
	public $template = 'template.twig';
	
	/**
	 * html title of the page
	 */
	private static $title = 'Mail';
	
	/**
	 * all sections
	 */
	private static $sections = array();
	
	/**
	 * current user
	 */
	private static $user = false;
	
	
	public function before()
	{
		parent::before();
		$this->theme = \Theme::instance();
		$this->theme->set_template($this->template);
		
	}
	
	public function after($response)
	{
		$this->template->set('css', $this->css(), false);
		$this->template->set('js', $this->js(), false);
		$this->template->set('title', self::$title);
		$this->template->set('sections', self::$sections, false);
		
		return parent::after($response);
	}
	
	/**
	 * all css files of the theme
	 */
	public function css()
	{
		$css = array(
			'normalize.css',
			'chosen.css'
		);
		$this->theme->asset->css($css, array(), 'css');
		
		return $this->theme->asset->render('css');
	}
	
	/**
	 * all js files of the theme
	 */
	public function js()
	{
		$js = array(
			'https://ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools.js',
			'mootools-more.js',
			'chosen.js',
		);
		$this->theme->asset->js($js, array(), 'js');
		
		return $this->theme->asset->render('js');
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
	}
	
	/**
	 * set the page title
	 */
	protected static function set_title($title)
	{
		self::$title = $title;
	}
	
	/**
	 * add an item to a section
	 * @param String	title of the section
	 * @param Mixes		element to add
	 * @param String	title of the item to use as key
	 */
	public static function add_to_section($title, $element, $name)
	{
		if (isset($name))
		{
			self::$sections[$title][$name] = $element;
		}
		else
		{
			self::$sections[$title][] = $element;
		}
	}
	
	/**
	 * clear a section
	 * @param String	title of the section
	 */
	public static function clear_section($title)
	{
		self::$sections[$title] = array();
	}
}
