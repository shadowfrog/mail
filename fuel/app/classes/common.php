<?php

abstract class Common extends Controller_Hybrid {
	
	/**
	 * Use a twig template
	 */
	public $template = 'template.twig';
	
	/**
	 * html title of the page
	 */
	protected $_title = 'Mail';
	
	/**
	 * all sections
	 */
	protected $_sections = array();
	
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
}
