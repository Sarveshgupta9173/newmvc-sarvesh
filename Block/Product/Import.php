<?php 

class Block_Product_Import extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Product/import.phtml');
	}

	public function getCollection()
	{
		//get the data;
	}
}

?>