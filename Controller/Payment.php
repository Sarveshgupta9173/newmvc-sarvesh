<?php 

class Controller_Payment extends Controller_Core_Action
{	
	public function indexAction()
	{
		$layout = $this->getLayout();
		$index = $layout->createBlock('Core_Layout')->setTemplate('core/index.phtml');
		$layout->getChild('content')->addChild('index',$index);
		echo $layout->toHtml();
	}

	public function gridAction(){

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Payment_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');
	} 

	public function addAction(){
		$payment = Ccc::getModel('Payment');
		Ccc::register('payments',$payment);
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Payment_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	} 

	public function editAction(){

		$id = (int) $this->getRequest()->getParams("id");
		$payments = Ccc::getModel('Payment')->load($id);
		$payments = Ccc::register('payments',$payments);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Payment_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
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
			$layout = $this->getLayout();
			$grid = $layout->createBlock('Payment_Grid')->toHtml();
			echo json_encode(['html'=>$grid,'element'=>'content-html']);
			@header('Content-type:application/json');
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

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Payment_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-type:application/json');

	} 

}

?>