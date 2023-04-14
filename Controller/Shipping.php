<?php 

class Controller_Shipping extends Controller_Core_Action
{
	public function addAction(){

		$layout = new Block_Core_Layout();
		$add = new Block_Shipping_Add();
		$layout->getchild('content')->addChild('add',$add);
		$layout->render();
	}

	public function editAction(){
		$request = $this->getRequest();
		$id = $request->getParams("id");
		$shippings = Ccc::getModel('Shipping')->load($id);
		Ccc::register('shippings',$shippings);
		
		$layout = $this->getLayout();
		$edit = new Block_Shipping_Edit();
		$children = $layout->getChild('content')->addChild('edit',$edit);
		$layout->render();

	}

	public function gridAction(){
		$sql = "SELECT * FROM `shipping`";
		$shippings = Ccc::getModel('Shipping')->fetchAll($sql);
		Ccc::register('shippings',$shippings);

		$layout = $this->getLayout();
		$grid = new Block_Shipping_Grid();
		$children = $layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

	public function insertAction(){


		try {
		$message = new Model_Core_Message();	
			
		$request = $this->getRequest();

		$request->isPost();

		$shipping = $request->getPost("shipping");

		$shippingModel = new Model_Shipping();
		$data = $shippingModel->insert($shipping);
		$message = new Model_Core_Message();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

			} catch (Exception $e) {
		$request = $this->getRequest();

			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
	
			}	
		

		$this->redirect('grid','shipping',null,true);
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

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','shipping',null,true);
	}

	public function updateAction(){

		try {
		$message = new Model_Core_Message();	
			
		$request = $this->getRequest();

		$request->isPost();

		$shipping = $request->getPost("shipping");
		$id = $request->getParams("id","key doesn't exists");

		$shippingModel = new Model_Shipping();
		$data = $shippingModel->update($shipping,$id);

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);

		}

		$this->redirect('grid','shipping',null,true);

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

		$this->redirect('grid','shipping',null,true);

	}

}

?>