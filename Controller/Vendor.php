<?php 

class Controller_Vendor extends Controller_Core_Action
{
	public function indexAction()
	{
		$layout = $this->getLayout();
		$index = $layout->createBlock('Core_Layout')->setTemplate('core/index.phtml');
		$layout->getChild('content')->addChild('index',$index);
		echo $layout->toHtml();
	}

	public function addAction(){
		$vendor = Ccc::getModel('Vendor');
		Ccc::register('vendor',$vendor);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Vendor_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function editAction(){

		$request = $this->getRequest();
		$id = $request->getParams("id");

		$sql = "SELECT * FROM `vendor` INNER JOIN  `vendor_address` ON `vendor`.`vendor_id` = `vendor_address`.`vendor_id` WHERE `vendor`.`vendor_id` = '{$id}' ";
		$data = Ccc::getModel('Vendor')->fetchRow($sql);
		Ccc::register('vendor',$data);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Vendor_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function gridAction(){
		
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Vendor_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function insertAction(){

		try {
			$message = Ccc::getModel('Core_Message');
	
			$request = $this->getRequest();
			$request->isPost();
			$vendordata = $request->getPost('vendor');
			$vendor = Ccc::getModel('Vendor');
			$vendor->data = $vendordata;
			$vendor->save();

			$id = $vendor->vendor_id;
			$vendor->removeData();
			
			$address = $request->getPost('address');
			$vendorAddress = Ccc::getModel('VendorAddress');
			$vendorAddress->setData($address)->addData('vendor_id',$id);
			$vendorAddress->save();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}

		$this->redirect('grid','vendor',null,true);

	}

	public function updateAction(){
		try {
				
			$message = Ccc::getModel('Core_Message');

			$request = $this->getRequest();
			$request->isPost();
			$data = $request->getPost("vendor");
			$vendor= Ccc::getModel('Vendor');
			$vendor->setData($data);
			$vendor->save();

			// $id = $this->getModelRow()->vendor_id;
			$vendor->removeData();

			$address = $request->getPost('address');
			$addressModelRow = Ccc::getModel('VendorAddress');
			$addressModelRow->setData($address);
			$addressModelRow->save();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);


		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);

		}
		
		$this->redirect('grid','vendor',null,true);
	}

	public function deleteAction(){

		try {
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			
			$id = $request->getParams("id");
			Ccc::getModel('Vendor')->load($id)
			->delete();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {

			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
		}		
		$this->redirect('grid','vendor',null,true);

	}

}


?>