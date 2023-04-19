<?php 

class Controller_Brand extends Controller_Core_Action
{	

	public function addAction(){
		$brands = Ccc::getModel('Brand');
		Ccc::register('brands',$brands);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Brand_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	} 

	public function editAction(){

		$id = (int) $this->getRequest()->getParams("id");
		$brands = Ccc::getModel('Brand')->load($id);
		Ccc::register('brands',$brands);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Brand_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	} 

	public function gridAction(){

		$sql = "SELECT * FROM `brand`";
		$brands = Ccc::getModel('Brand')->fetchAll($sql);
		if (!$brands) {
			throw new Exception("No data found.", 1);
		}

		Ccc::register('brands', $brands);

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Brand_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	} 

	public function saveAction()
	{
		try {
			$request = $this->getRequest();
			$message = new Model_Core_Message();

			$data = $request->getPost("brand");
			// print_r($data);die;
			
			if($request->getParams("id")){ 								//update
			$brand = Ccc::getModel('Brand');
			$brand->data = $data;
			$brand->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{ 
				$brand = Ccc::getModel('Brand');          			//insert
				$brand->data = $data;
				$brand->save();

				$message->addMessage('Brand Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage(' Brand Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','brand',null,true);
	}

	public function deleteAction(){

		try {
			$message = Ccc::getModel("Core_Message");
			$id = $this->getRequest()->getParams("id");
			$payment = Ccc::getModel('Brand')->load($id);
			$payment->delete();

			$message->addMessage('Brand deleted successfully',Model_Core_Message::SUCCESS);
		
		} catch (Exception $e) {
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);
		}

		$this->redirect('grid','brand',null,true);

	} 

}

?>