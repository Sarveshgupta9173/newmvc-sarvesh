<?php 

class Block_Salesman_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Salesman');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('sales_id',[
			'title' => 'Product Id'
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
		$this->addAction('media',[
			'title' => 'Price',
			'method' => 'getMediaUrl'
		]);
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
		$this->addButton('sales_id',[
			'title' => 'Add Salesman',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$salesman = Ccc::getRegistry('salesman');
		$this->setData(['salesman'=>$salesman]);
		return $salesman;
	}
}

?>