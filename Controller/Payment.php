<?php 

class Controller_Payment extends Controller_Core_Action
{	

	public function addAction(){
		$payment = Ccc::getModel('Payment');
		Ccc::register('payments',$payment);
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Payment_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	} 

	public function editAction(){

		$id = (int) $this->getRequest()->getParams("id");
		$payments = Ccc::getModel('Payment')->load($id);
		$payments = Ccc::register('payments',$payments);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Payment_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	} 

	public function gridAction(){

		$sql = "SELECT * FROM `payments`";
		$payments = Ccc::getModel('Payment')->fetchAll($sql);
		if (!$payments) {
			throw new Exception("No data found.", 1);
		}

		Ccc::register('payments', $payments);

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Payment_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	} 

	public function insertAction(){

		try {
				
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();

			$request->isPost();

			$payment = $request->getPost("payment");

			$paymentModel = new Model_Payment();
			$data = $paymentModel->insert($payment);

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}
	

		$this->redirect('grid','payment',null,true);
	}

	public function saveAction()
	{
		

		try {
			$request = $this->getRequest();
			$message = new Model_Core_Message();

			$data = $request->getPost("payment");
			
			if($request->getParams("id")){ 								//update
			$payment = Ccc::getModel('Payment');
			$payment->data = $data;
			$payment->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{ 
				$payment = Ccc::getModel('Payment');          			//insert
				$payment->data = $data;
				$payment->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','payment',null,true);
	}

	public function updateAction(){

		try {
				
			$message = new Model_Core_Message();
			$request = $this->getRequest();

			$request->isPost();
			
			$id = $request->getParams("id");
			$payment = $request->getPost("payment");

			$paymentModel = new Model_Payment();
			$data = $paymentModel->update($payment,$id);
			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);


		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
			
		}

		$this->redirect('grid','payment',null,true);
	} 

	public function deleteAction(){

		try {
			$message = Ccc::getModel("Core_Message");
			$id = $this->getRequest()->getParams("id");
			$payment = Ccc::getModel('Payment')->load($id);
			$payment->delete();

			$message->addMessage('Payment deleted successfully',Model_Core_Message::SUCCESS);
		
		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);

		
			
		}

		$this->redirect('grid','payment',null,true);

	} 

}

?>