<?php

namespace Mail;

class Controller_Outbox extends \Common {
	
	public function action_index()
	{	
		$this->template->set('title', 'Postausgang');		
	}
	
}
