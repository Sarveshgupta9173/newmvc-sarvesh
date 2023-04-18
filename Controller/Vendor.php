<?php 

class Controller_Vendor extends Controller_Core_Action
{

	public function addAction(){
		$vendor = Ccc::getModel('Vendor');
		Ccc::register('vendor',$vendor);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Vendor_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	}

	public function editAction(){

		$request = $this->getRequest();
		$id = $request->getParams("id");

		$sql = "SELECT * FROM `vendor` INNER JOIN  `vendor_address` ON `vendor`.`vendor_id` = `vendor_address`.`vendor_id` WHERE `vendor`.`vendor_id` = '{$id}' ";
		$data = Ccc::getModel('Vendor')->fetchRow($sql);
		Ccc::register('vendor',$data);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Vendor_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	}

	public function gridAction(){

		$sql = "SELECT * FROM `vendor` INNER JOIN `vendor_address` ON `vendor`.`vendor_id` = `vendor_address`.`vendor_id`";
		$vendors = Ccc::getModel('Vendor')->fetchAll($sql);
		Ccc::register('vendors',$vendors);
		
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Vendor_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
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