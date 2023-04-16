<?php 

class Controller_Salesman extends Controller_Core_Action
{

	public function gridAction(){

		$sql = "SELECT * FROM `salesman`";
		$salesman = Ccc::getModel('Salesman')->fetchAll($sql);
		Ccc::register('salesman',$salesman);

		$grid = $this->createBlock('Salesman_Grid');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

	public function addAction(){

		$add = $this->createBlock('Salesman_Add');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('add',$add);
		$layout->render();
	}

	public function editAction(){

		$request = $this->getRequest();
		$id = $request->getParams("id");

		$sql = "SELECT * FROM `salesman` where sales_id='{$id}';";
		$salesman = Ccc::getModel('Salesman')->load($id);
		Ccc::register('salesman',$salesman);
		
		$edit = $this->createBlock('Salesman_Edit');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();

	}

	public function priceAction(){
		$this->getTemplate('Salesman/sprice.phtml');
		
	}

	public function saveAction()
	{
		try {
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$data = $request->getPost("salesman");
			
			if($request->getParams("id")){  		   //update
			$product = Ccc::getModel('Salesman');                         			//insert
			$product->data = $data;
			$product->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{    
				$product = Ccc::getModel('Salesman');                         			//insert
				$product->data = $data;
				$product->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','salesman',null,true);
	}

	public function deleteAction(){

		try {
			
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$salesman = Ccc::getModel('Salesman')->load($id)->delete();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
		}

		$this->redirect('grid','salesman',null,true);
	}
}

?>