<?php 

class Block_Brand_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Brand/grid.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$brands = Ccc::getRegistry('brands');
		$this->setData(['brands'=>$brands]);
		return $this;
	}
}

?>