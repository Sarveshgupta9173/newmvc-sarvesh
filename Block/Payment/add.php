<?php 

class Block_Payment_Add extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Payment/add.phtml');
	}
}

?>