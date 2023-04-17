<?php 

class Controller_Customer extends Controller_Core_Action
{
	public function addAction(){

		$customer = Ccc::getModel('Customer');

		Ccc::register('customer',$customer);
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Customer_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	}

	public function editAction(){
		$request = $this->getRequest();
		$id = $request->getParams("id");

		$sql = "SELECT * FROM `customer` INNER JOIN  `customer_address` ON `customer`.`customer_id` = `customer_address`.`customer_id` WHERE `customer`.`customer_id` = '{$id}' ";
		$customers = Ccc::getModel('Customer')->fetchRow($sql);

		Ccc::register('customer',$customers);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Customer_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
		
	}

	public function gridAction(){
		$sql = "SELECT * FROM `customer` INNER JOIN `customer_address` ON `customer`.`customer_id` = `customer_address`.`customer_id`";
		$customers = Ccc::getModel('Customer')->fetchAll($sql);
		Ccc::register('customers',$customers);

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Customer_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

	public function insertAction(){
		try {
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$request->isPost();
			$data = $request->getPost("customer");
			$customer = Ccc::getModel('Customer');
			$customer->data = $data;
			$customer->save();

			$id = $customer->customer_id;
			$customer->removeData();

			$address = $request->getPost('address');
			$customerAddress = Ccc::getModel('CustomerAddress');
			$customerAddress->setData($address)->addData('customer_id',$id);
			$customerAddress->save();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {

			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
		}
		$this->redirect('grid','customer',null,true);
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
		$this->redirect('grid','customer',null,true);

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

		$this->redirect('grid','customer',null,true);

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