<?php 

class Block_Product_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Product/grid.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$products = Ccc::getRegistry('products');
		$this->setData(['products'=>$products]);
		return $this;
	}
}

?>