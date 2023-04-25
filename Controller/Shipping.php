<?php 

class Controller_Shipping extends Controller_Core_Action
{
	public function indexAction()
	{
		$layout = $this->getLayout();
		$index = $layout->createBlock('Core_Layout')->setTemplate('core/index.phtml');
		$layout->getChild('content')->addChild('index',$index);
		echo $layout->toHtml();
	}

	public function addAction(){
		$shipping = Ccc::getModel('Shipping');
		Ccc::register('shippings',$shipping);
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Shipping_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function editAction(){
		$request = $this->getRequest();
		$id = $request->getParams("id");
		$shippings = Ccc::getModel('Shipping')->load($id);
		Ccc::register('shippings',$shippings);
		
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Shipping_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}

	public function gridAction(){
		$sql = "SELECT * FROM `shipping`";
		$shippings = Ccc::getModel('Shipping')->fetchAll($sql);

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Shipping_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-type:application/json');
	}

	public function saveAction()
	{
		try {
			
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$data = $request->getPost("shipping");
			$shipping = Ccc::getModel('Shipping');

			if($request->getParams("id")){ 
			 		   									//update
			$shipping->data = $data;
			$shipping->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{                             			//insert
				$shipping->data = $data;
				$shipping->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}
			$layout = $this->getLayout();
			$grid = $layout->createBlock('Shipping_Grid')->toHtml();
			echo json_encode(['html'=>$grid,'element'=>'content-html']);
			@header('Content-type:application/json');

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}

		
	}

	public function deleteAction(){

		try {
			$message = Ccc::getModel('Core_Message');	
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$shipping = Ccc::getModel('Shipping');
			$shipping->load($id);
			$shipping->delete();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);


		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Shipping_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-type:application/json');

	}

}

?>