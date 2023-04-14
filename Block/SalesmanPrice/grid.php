<?php 

class Block_SalesmanPrice_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Salesman/sprice.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$salesmanPrice = Ccc::getRegistry('salesmanprice');
		$this->setData(['salesman'=>$salesmanPrice]);
		return $this;
	}
}

?>