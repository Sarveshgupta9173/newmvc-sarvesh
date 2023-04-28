<?php 

class Block_Payment_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Payments');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('payment_id',[
			'title' => 'Category Id'
		]);
		$this->addColumn('name',[
			'title' => 'Name'
		]);
		$this->addColumn('amount',[
			'title' => 'Amount'
		]);
		$this->addColumn('status',[
			'title' => 'Status'
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
		$this->addButton('payment_id',[
			'title' => 'Add Payment',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$sql = "SELECT COUNT(`payment_id`) FROM `payments` ORDER BY `payment_id` DESC";
		$total = Ccc::getModel('Core_Adapter')->fetchOne($sql);
		$this->getPager()->setTotalRecords($total)->calculate();

		$sql = "SELECT * FROM `payments` ORDER BY `payment_id` DESC LIMIT {$this->getPager()->startLimit},{$this->getPager()->recordPerPage}";
		$payments = Ccc::getModel('Payment')->fetchAll($sql);
		$this->setData(['payments'=>$payments]);
		return $payments;
	}	

}

?>