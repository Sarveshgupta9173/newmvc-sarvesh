<?php 

class Block_Payment_Edit extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Payment/edit.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$payments = Ccc::getRegistry('payments');	
		$this->setData($payments);
		return $this;
	}
}

?>