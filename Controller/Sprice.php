<?php 

class Controller_Sprice extends Controller_Core_Action
{

	public function gridAction(){
		$id = $this->getRequest()->getParams("id");
		$sql = "SELECT * FROM `product` LEFT JOIN `salesman` ON `product_id` = `product_id` WHERE `sales_id`='{$id}' ";

		$price = Ccc::getModel('salesmanPrice')->fetchAll($sql); 
		
		$grid = new Block_SalesmanPrice_Grid();
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('grid',$grid);
	}


}
?>