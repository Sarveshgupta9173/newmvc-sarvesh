<?php 

class Block_Eav_Attribute_Edit extends Block_Core_Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('Eav/Attribute/Edit.phtml');
	}
}