<?php

namespace Backend;

use \Config;

abstract class Common extends \Common {

	public function before()
	{
		parent::before();

		$this->_sections = Config::load('sections');
	}
	
}
