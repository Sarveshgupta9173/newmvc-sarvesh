<?php 

class Block_Media_Add extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Media/add.phtml');
	}
}

?>