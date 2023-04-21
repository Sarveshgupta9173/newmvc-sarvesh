<?php 

class Block_Quote_Grid extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Quote');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('order_id',[
			'title' => 'Order Id'
		]);
		$this->addColumn('customer_id',[
			'title' => 'Customer Id'
		]);
		$this->addColumn('total',[
			'title' => 'Total'
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
		$this->addColumn('payment_id',[
			'title' => 'Payment Id'
		]);
		$this->addColumn('shipping_id',[
			'title' => 'Shipping Id'
		]);
		$this->addColumn('shippment_amount',[
			'title' => 'Shippment Amount'
		]);

		return parent::_prepareColumns();
	}

	protected function _prepareActions()
	{
		$this->addAction('media',[
			'title' => 'Media',
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
		$this->addButton('product_id',[
			'title' => 'Add Product',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$sql = "SELECT * FROM `quote`";
		$quotes = Ccc::getModel('Quote')->fetchAll($sql);
		return $quotes;
	}
}

?>