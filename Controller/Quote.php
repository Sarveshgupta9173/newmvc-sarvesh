<?php 

class Controller_Quote extends Controller_Core_Action
{
	public function gridAction()
	{
		$sql = "SELECT * FROM `quote`";
		$quote = Ccc::getModel('Quote')->fetchAll($sql);
		Ccc::register('quote',$quote);
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Quote_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();

	}
}

?>