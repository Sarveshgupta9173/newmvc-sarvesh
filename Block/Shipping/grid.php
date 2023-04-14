<?php 

class Block_Shipping_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Shipping/grid.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$shippings = Ccc::getRegistry('shippings');
		$this->setData(['shippings'=>$shippings]);
		return $this;
	}
}


?>