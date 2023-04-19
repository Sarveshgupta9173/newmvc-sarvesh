<?php 

class Controller_Product extends Controller_Core_Action
{
	public function addAction(){
		$products = Ccc::getModel('Product');
		Ccc::register('products',$products);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Product_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	}

	public function editAction(){

		$id = (int) $this->getRequest()->getParams("id");
		$products = Ccc::getModel('Product')->load($id);
		Ccc::register('products',$products);
		$edit = new Block_Product_Edit();
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Product_Edit');
		$layout->getChild('content')->addChild('edit',$edit);
		$layout->render();
	}

	public function gridAction(){
		$sql = "SELECT * FROM `product`";
		$products = Ccc::getModel('Product')->fetchAll($sql);
		if(!$products){
			throw new Exception("No data found", 1);
		}
		
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Product_Grid');
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	
	}

	public function insertAction(){


		try {

			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$request->isPost();
			$product = $request->getPost("product");

			$this->getResourceClass()->products = $product;  //set magic method
			$this->getResourceClass()->save();
		
			$message->addMessage('Product Inserted successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {

			$message->addMessage(' Product not inserted',Model_Core_Message::FAILURE);
		}

		$this->redirect('grid','product',null,true);
	}

	public function saveAction()
	{
		

		try {
			$request = $this->getRequest();
			$message = new Model_Core_Message();

			$data = $request->getPost("product");
			$product = Ccc::getModel('Product');                         			
			
			if($request->getParams("id")){  		   //update
			$product->data = $data;
			$product->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{    
				$product->data = $data;					//insert
				$product->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','product',null,true);
	}

	public function updateAction(){

		try {
			
			$message = new Model_Core_Message();
			$request = $this->getRequest();

			$request->isPost();
			$product = $request->getPost("product");
			// print_r($product);
			
			if(!$product){
				echo "data not present";
			}
			// $productmodel = new Model_Product();
			$this->getModelRow()->products = $product;   //set magic method to set an array in object
			// print_r($product);
			$this->getModelRow()->save();
		
			$message->addMessage('Updated successfully',Model_Core_Message::SUCCESS);
		
		} catch (Exception $e) {
			$message->addMessage('Updation not performed',Model_Core_Message::FAILURE);
			
		}
		$this->redirect('grid','product',null,true);
	}

	public function deleteAction(){
		try {

			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$product = Ccc::getModel('Product');
			$product->load($id);
			$product->delete();

			$message->addMessage('Deleted  successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('Not deleted ',Model_Core_Message::FAILURE);
		}

		$this->redirect('grid','product',null,true);

	}
}

?>