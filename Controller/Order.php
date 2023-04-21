<?php 

class Controller_Order extends Controller_Core_Action
{
	public function gridAction()
	{
		$sql = "SELECT * FROM `order`";
		$quote = Ccc::getModel('Order');
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Order_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

}

?>