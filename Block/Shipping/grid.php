<?php 

class Block_Shipping_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Shippings');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('shipping_id',[
			'title' => 'Shipping Id'
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
		$this->addButton('shipping_id',[
			'title' => 'Add Shipping',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$sql = "SELECT * FROM `shipping`";
		$shippings = Ccc::getModel('Shipping')->fetchAll($sql);
		return $shippings;
	}
}



?>