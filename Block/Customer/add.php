<?php 

class Block_Customer_Add extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Customer/add.phtml');
	}
}

?>