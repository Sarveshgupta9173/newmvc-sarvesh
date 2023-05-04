<?php 

class Block_Product_Grid extends Block_Core_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Product');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('product_id',[
			'title' => 'Product Id'
		]);
		$this->addColumn('name',[
			'title' => 'Name'
		]);
		$this->addColumn('cost',[
			'title' => 'Cost'
		]);
		$this->addColumn('price',[
			'title' => 'Price'
		]);
		$this->addColumn('sku',[
			'title' => 'SKU'
		]);
		$this->addColumn('quantity',[
			'title' => 'Quantity'
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
		$this->addButton('import',[
			'title' => 'Import',
			'url' => $this->getUrl('import')
		]);
		$this->addButton('export',[
			'title' => 'Export',
			'url' => $this->getUrl('export')
		]);


		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$pager = $this->getPager();
		$sql = "SELECT COUNT(`product_id`) FROM `product`ORDER BY `product_id` DESC";
		$total = Ccc::getModel('Core_Adapter')->fetchOne($sql);
		$pager->setTotalRecords($total)->calculate();

		$sql = "SELECT * FROM `product` LIMIT $pager->startLimit,$pager->recordPerPage";
		$products = Ccc::getModel('Product')->fetchAll($sql);
		return $products;
	}

}

?>