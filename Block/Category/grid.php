<?php 

class Block_Category_Grid extends Block_Core_Grid
{

	public function __construct()
	{
		parent::__construct();
		$this->setTitle('Manage Categories');
	}

	protected function _prepareColumns()
	{
		$this->addColumn('category_id',[
			'title' => 'Category Id'
		]);
		$this->addColumn('name',[
			'title' => 'Name'
		]);
		$this->addColumn('description',[
			'title' => 'Description'
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
		$this->addButton('category_id',[
			'title' => 'Add Category',
			'url' => $this->getUrl('add')
		]);

		return parent::_prepareButtons();	
	}

	public function getCollection()
	{
		$sql = "SELECT COUNT(`category_id`) FROM `category` ORDER BY `category_id` DESC";
		$total = Ccc::getModel('Core_Adapter')->fetchOne($sql);
		$this->getPager()->setTotalRecords($total)->calculate();

		$pager = $this->getPager();
		$sql = "SELECT * FROM `category` LIMIT $pager->startLimit,$pager->recordPerPage";
		$category = Ccc::getModel('Category')->fetchAll($sql);
		return $category;
	}


}

?>