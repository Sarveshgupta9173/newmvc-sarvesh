<?php 

class Controller_Category extends Controller_Core_Action
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
		$grid = $layout->createBlock('Category_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}
	
	public function addAction(){
		$category = Ccc::getModel('Category');
		Ccc::register('category',$category);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Category_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function editAction(){

		$request = Ccc::getModel('Core_Request');
		$id = $request->getParams("id");
		$sql = "SELECT * FROM `category` WHERE `category_id` = '{$id}'";
		$data = Ccc::getModel('Category')->fetchRow($sql);
		Ccc::register('category',$data);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Category_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
		
	}

	public function saveAction()
	{
		try {
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$request->isPost();
			$data = $request->getPost('category');
			$category = Ccc::getModel('Category');
			$category = Ccc::getModel('Category');

			$id = $request->getParams("id");


			if($request->getParams("id")){   				//update
				$category->data = $data;
				$category->save();
				$message->addMessage('category updated  successfully',Model_Core_Message::SUCCESS);

			}
			else{											// insert
				$category->data = $data;
				$category->save();
				$message->addMessage('category inserted  successfully',Model_Core_Message::SUCCESS);
			}
			
		} catch (Exception $e) {
			$message->addMessage('action not performed',Model_Core_Message::FAILURE);
		}
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Category_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}

	public function deleteAction(){
		try {
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$category = Ccc::getModel('Category');
			$category->load($id);
			$category->delete();

			$message->addMessage('Category deleted successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);

		}
		
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Category_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}


}

?>