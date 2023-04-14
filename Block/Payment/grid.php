<?php 

class Block_Payment_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Payment/grid.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$payments = Ccc::getRegistry('payments');
		$this->setData(['payments'=>$payments]);
		return $this;
	}
}

?>