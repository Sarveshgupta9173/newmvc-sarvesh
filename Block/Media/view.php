<?php 

class Block_Media_View extends Block_Core_Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('Media/view.phtml');
		$this->getCollection();
	}

	public function getCollection()
	{
		$medias = Ccc::getRegistry('medias');
		$this->setData(['medias'=>$medias]);
		return $this;
	}
}

?>