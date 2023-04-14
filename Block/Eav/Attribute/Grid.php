<?php 

class Block_Eav_Attribute_Grid extends Block_Core_Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('Eav/Attribute/Grid.phtml');
	}

	public function getCollection()
	{
		$attribute = Ccc::getModel('Eav_Attribute');
		$sql = "SELECT * FROM `eav_attribute`";
		$data = $attribute->fetchAll($sql);
		$this->setData(['data'=>$data]);
		return $data;
	}
}

 ?>