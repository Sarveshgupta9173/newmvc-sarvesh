<?php 

class Block_Shipping_Add extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Shipping/add.phtml');
	}
}

?>