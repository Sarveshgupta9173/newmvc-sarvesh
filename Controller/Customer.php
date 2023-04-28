<?php 

class Controller_Customer extends Controller_Core_Action
{
	public function indexAction()
	{
		$layout = $this->getLayout();
		$index = $layout->createBlock('Core_Layout')->setTemplate('core/index.phtml');
		$layout->getChild('content')->addChild('index',$index);
		echo $layout->toHtml();
	}

	public function addAction(){

		$customer = Ccc::getModel('Customer');
		Ccc::register('customer',$customer);
		
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Customer_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function editAction(){
		$request = $this->getRequest();
		
		$id = $request->getParams("id");

		$sql = "SELECT * FROM `customer` INNER JOIN  `customer_address` ON `customer`.`customer_id` = `customer_address`.`customer_id` WHERE `customer`.`customer_id` = '{$id}' ";
		$customers = Ccc::getModel('Customer')->fetchRow($sql);

		Ccc::register('customer',$customers);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Customer_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
		
	}

	public function gridAction(){
		

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Customer_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function saveAction()
	{
		try {
			$request = $this->getRequest();
			$message = Ccc::getModel('Core_Message');

			$data = $request->getPost("customer");

			$customer = Ccc::getModel('Customer');
			
			if($request->getParams("id")){  		   //update
			$customer->data = $data;
			$customer->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{                             			//insert
				$customer->data = $data;
				$customer->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Customer_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}

	public function updateAction(){
	

		try {
			$message = Ccc::getModel('Core_Message');

			$request = $this->getRequest();
			$request->isPost();
			$data = $request->getPost("customer");
			$customer= Ccc::getModel('Customer');
			$customer->setData($data);
			$customer->save();

			// $id = $this->getModelRow()->customer_id;
			$customer->removeData();

			$address = $request->getPost('address');
			$addressModelRow = Ccc::getModel('CustomerAddress');
			$addressModelRow->setData($address);
			$addressModelRow->save();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Customer_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}

	public function deleteAction(){

		try {
			
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$customer = Ccc::getModel('Customer');

			$id = $request->getParams("id");
			$customer->load($id);
			$customer->delete();

			$message->addMessage('action performed successfully',Model_Core_Message::SUCCESS);
		
		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}
	
		$this->redirect('grid','customer',null,true);
		
	}

}


?>