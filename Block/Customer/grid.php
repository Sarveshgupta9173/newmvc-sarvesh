<?php 

class Block_Customer_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Customer');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('customer_id',[
			'title' => 'Customer Id'
		]);
		$this->addColumn('fname',[
			'title' => 'First Name'
		]);
		$this->addColumn('lname',[
			'title' => 'Last Name'
		]);
		$this->addColumn('email',[
			'title' => 'Email'
		]);
		$this->addColumn('gender',[
			'title' => 'Gender'
		]);
		$this->addColumn('mobile',[
			'title' => 'Mobile'
		]);
		$this->addColumn('address',[
			'title' => 'Address'
		]);
		$this->addColumn('created_at',[
			'title' => 'Created At'
		]);
		$this->addColumn('updated_at',[
			'title' => 'Updated At'
		]);	

		return parent::_prepareColumns();
	}

	protected function _prepareActions()
	{
		$this->addAction('edit',[
			'title' => 'Edit',
			'method' => 'getEditUrl'
		]);
		$this->addAction('delete',[
			'title' => 'Delete',
			'method' => 'getDeleteUrl'
		]);

		return parent::_prepareActions();
	}

	protected function _prepareButtons()
	{
		$this->addButton('customer_id',[
			'title' => 'Add Customer',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}


	public function getCollection()
	{
		$sql = "SELECT COUNT(`customer_id`) FROM `customer` ORDER BY `customer_id` DESC";
		$total = Ccc::getModel('Core_Adapter')->fetchOne($sql);
		$this->getPager()->setTotalRecords($total)->calculate();


		$sql = "SELECT * FROM `customer` INNER JOIN `customer_address` ON `customer`.`customer_id` = `customer_address`.`customer_id`";
		$customers = Ccc::getModel('Customer')->fetchAll($sql);
		$this->setData(['customers'=>$customers]);
		return $customers;
	}
}

?>