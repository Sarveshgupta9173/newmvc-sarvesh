<?php 

class Block_Brand_Edit extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Brand/edit.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$brands = Ccc::getRegistry('brands');	
		$this->setData($brands);
		return $this;
	}
}

?>