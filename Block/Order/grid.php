<?php 

class Block_Order_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Order/add.phtml');
	}

	

	public function getCollection()
	{
		$sql = "SELECT * FROM `order`";
		$orders = Ccc::getModel('Order')->fetchAll($sql);
		return $orders;
	}

	public function getCustomers()
	{
		$sql = "SELECT * FROM `customer`";
		$customers = Ccc::getModel('Customer')->fetchAll($sql);
		return $customers;
	}
}

?>