<?php 

class Block_Html_Head extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Html/head.phtml');
	}
}

?>