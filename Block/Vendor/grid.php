<?php 

class Block_Vendor_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Vendors');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('vendor_id',[
			'title' => 'Vendor Id'
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
		$this->addColumn('company',[
			'title' => 'Company'
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
		$this->addButton('vendor_id',[
			'title' => 'Add Vendors',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$sql = "SELECT COUNT(`vendor_id`) FROM `vendor` ORDER BY `vendor_id` DESC";
		$total = Ccc::getModel('Core_Adapter')->fetchOne($sql);
		$this->getPager()->setTotalRecords($total)->calculate();

		$sql = "SELECT * FROM `vendor` INNER JOIN `vendor_address` ON `vendor`.`vendor_id` = `vendor_address`.`vendor_id`";
		$vendors = Ccc::getModel('Vendor')->fetchAll($sql);
		$this->setData(['vendors'=>$vendors]);
		return $vendors;
	}
}

?>