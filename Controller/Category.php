<?php 

class Controller_Category extends Controller_Core_Action
{	
	public function addAction(){
		$add = $this->createBlock('Category_Add');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('add',$add);
		$layout->render();
	}

	public function editAction(){

		$request = Ccc::getModel('Core_Request');
		$id = $request->getParams("id");
		$sql = "SELECT * FROM `category` WHERE `category_id` = '{$id}'";
		$data = Ccc::getModel('Category')->fetchRow($sql);
		Ccc::register('category',$data);

		$edit = $this->createBlock('Category_Edit');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
		
	}

	public function gridAction(){
		
		$sql = "SELECT * FROM `category`";
		$category = Ccc::getModel('Category')->fetchAll($sql);
		Ccc::register('category',$category);

		$grid = $this->createBlock('Category_Grid');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();

	}

	public function insertAction(){

		try {
			
			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();

			$request->isPost();
			$category = $request->getPost("category");

			$this->getModelRow()->data = $category;
			$this->getModelRow()->save();

			$message->addMessage('category inserted  successfully',Model_Core_Message::SUCCESS);
			$message->addMessage('category inserted  successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('action not performed',Model_Core_Message::FAILURE);

		}
		$this->redirect('grid','category',null,true);
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
		$this->redirect('grid','category',null,true);

	}

	public function updateAction(){

		try {
			$message = Ccc::getModel('Core_Message');

			$request = $this->getRequest();

			$request->isPost();
			$id = $request->getParams("id");
			$category = $request->getPost("category");
		
			$this->getModelRow()->data = $category;
			$this->getModelRow()->save();

			$message->addMessage('action performeed successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('task not performed',Model_Core_Message::FAILURE);

		}

		$this->redirect('grid','category',null,true);
		
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
		
		$this->redirect('grid','category',null,true);

	}


}

?>