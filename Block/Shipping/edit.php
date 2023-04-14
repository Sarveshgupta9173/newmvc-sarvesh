<?php 

class Block_Shipping_Edit extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Shipping/edit.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$shippings = Ccc::getRegistry('shippings');
		$this->setData($shippings);
		return $this;
	}
}


?>